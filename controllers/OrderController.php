<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/23
 * Time: 上午11:42
 */

namespace app\controllers;


use app\common\wechat\Weixin;
use app\controllers\api\AdminBaseController;
use app\models\Account;
use app\models\Course;
use app\models\GuaguaOrder;
use app\models\User;
use Yii;
use yii\helpers\Url;

class OrderController extends AdminBaseController {

    public function actionPay(){
        Yii::$app->response->format = 'json';
        $account = Account::find()
            ->andWhere(['id' => $this->uid])
            ->asArray()
            ->one();
        $order_id = Yii::$app->request->post('id');
//        $app = Weixin::getApp();
        $order = GuaguaOrder::find()
            ->select("guagua_order.price,guagua_order.out_trade_no,course.title")
            ->leftJoin(Course::tableName(), 'guagua_order.course_id=course.id')
            ->andWhere(['guagua_order.id' => $order_id])
            ->andFilterWhere(['order.school_id'=>$this->schoolId])
            ->asArray()
            ->one();
        $attributes = [
            'trade_type' => 'JSAPI',
            'body' => $order['price'],
            'detail' => $order['title'],
            'out_trade_no' => $order['out_trade_no'],
            'total_fee' => 1, //$orderData['total_price']*100, // 单位：分
            'notify_url' => Url::to(['/order/notify'], true), // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'openid' => $account['openid']
        ];
        $result = Weixin::getPayment()->order->unify($attributes);
        $config = [];
        if($result->xml->return_code == 'SUCCESS'){
            $prepayId = $result->xml->prepay_id;
            $jssdk = Weixin::getPayment()->jssdk;
            $config = $jssdk->sdkConfig($prepayId);
        }
        return $config;
    }

    public function actionNotify(){
        $payment = Weixin::getPayment();
        $response = $payment->handlePaidNotify(function ($message, $fail){
            $order = GuaguaOrder::find()->andWhere(['out_trade_no' => $message['out_trade_no']])->one();
            if(!$order || $order->paid_at){
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
                    if ( !$account['uid'] ) {
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