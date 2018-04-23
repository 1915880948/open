<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/23
 * Time: 上午11:42
 */

namespace app\controllers;


use app\common\wechat\Weixin;
use app\models\Account;
use app\models\Course;
use app\models\GuaguaOrder;
use app\models\User;
use Yii;
use yii\base\Exception;
use yii\helpers\Json;
use yii\helpers\Url;

class OrderController extends AdminBaseController {

    public function actionPay() {
        $json_detail = Yii::$app->request->post('json_detail');
        $attributes = Json::decode($json_detail);
        $result = Weixin::getPayment()->order->unify($attributes);
        $config = [];
        //        var_dump($result['return_code']);die;
        if ($result['return_code'] === 'SUCCESS') {
            $prepayId = $result['prepay_id'];
            $jssdk = Weixin::getPayment()->jssdk;
            $config = $jssdk->sdkConfig($prepayId);
            //                $pay = "wx.chooseWXPay({
            //                        timestamp: {$config['timestamp']},
            //                        nonceStr: '{$config['nonceStr']}',
            //                        package: '{$config['package']}',
            //                        signType: '{$config['signType']}',
            //                        paySign: '{$config['paySign']}', // 支付签名
            //                        success: function (res) {
            //                            alert('支付成功');
            //                        }
            //                    });";
            //                echo "<script type='text/javascript' src='http://res.wx.qq.com/open/js/jweixin-1.3.0.js'></script>";
            //                echo "<script type='text/javascript'>{$pay}</script>";
            return $this->render('pay', compact('config'));
        } else {
            echo 'Error';
        }

    }

    public function actionNotify() {
        $payment = Weixin::getPayment();
        $response = $payment->handlePaidNotify(function ($message, $fail) {
            $order = GuaguaOrder::find()->andWhere(['out_trade_no' => $message['out_trade_no']])->one();
            if (!$order || $order->paid_at) {
                return true;
            }
            if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
                // 用户是否支付成功
                if ($message['result_code'] === 'SUCCESS') {
                    $order->is_pay = 1;
                    $order->pay_time = date('Y-m-d H:i:s');
                    $order->order_status = 1;
                    // 支付成功，第一次购买，在user表中增加一条数据。
                    $account = Account::find()->andWhere(['id' => $order->uid])->asArray()->one();
                    if (!$account['uid']) {
                        $info = [
                            'account_id' => $order->uid,
                            'username' => $order->contact_name,
                            'phone' => $order->contact_phone
                        ];
                        (new User())->create($info);
                    }
                } elseif ($message['result_code'] === 'FAIL') {
                    $order->order_status = 0;
                }
                $order->save();
                return true;
            } else {
                return $fail('通信失败，请稍后再通知我');
            }
        });
        $response->send();
    }
}