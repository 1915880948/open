<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/23
 * Time: 上午11:42
 */

namespace app\controllers;


use app\common\wechat\Weixin;
use GuzzleHttp\Client;
use Yii;
use yii\helpers\Json;

class OrderController extends AdminBaseController {

    public function actionPay() {
        $json_detail = Yii::$app->request->post('json_detail');
        $ret_url = Yii::$app->request->post('ret_url');
        $notify_url = Yii::$app->request->post('notify_url');
        $attributes = Json::decode($json_detail);
        $result = Weixin::getPayment()->order->unify($attributes);
        if ($result['return_code'] === 'SUCCESS') {
            $prepayId = $result['prepay_id'];
            $jssdk = Weixin::getPayment()->jssdk;
            $json = $jssdk->bridgeConfig($prepayId);
            var_dump(compact('ret_url'));
            var_dump($notify_url);die;
            Yii::$app->session->set($attributes['out_trade_no'].'_notify', $notify_url);
            return $this->render('pay', compact('json', 'ret_url'));
        } else {
            echo 'Error';
        }

    }

    public function actionNotify() {
        $payment = Weixin::getPayment();
        $response = $payment->handlePaidNotify(function ($message, $fail) {
            $client = new Client();
            $response = $client->request('POST', Yii::$app->session->get($message['out_trade_no'].'_notify'), [
                'form_params' => [
                    'message' => $message
                ]
            ]);
            $body = (string)($response->getBody());
            return true;
        });
        $response->send();
    }
}