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
        $error_url = Yii::$app->request->post('error_url');
        $attributes = Json::decode($json_detail);
        if(Yii::$app->cache->get($attributes['out_trade_no'].'_status')){
            return $this->redirect($ret_url);
        }
        $result = Weixin::getPayment()->order->unify($attributes);
//        Yii::error($result);
        if ($result['return_code'] === 'SUCCESS') {
            $prepayId = $result['prepay_id'];
            $jssdk = Weixin::getPayment()->jssdk;
            $json = $jssdk->bridgeConfig($prepayId);
            Yii::$app->cache->set($attributes['out_trade_no'].'_notify', $notify_url, 86400);
            return $this->render('pay', compact('json', 'ret_url','error_url'));
        } else {
            return $this->redirect($error_url);
        }

    }

    public function actionNotify() {
        $payment = Weixin::getPayment();
        $response = $payment->handlePaidNotify(function ($message, $fail) {
//            Yii::error($message);
            $client = new Client();
            $response = $client->request('POST', Yii::$app->cache->get($message['out_trade_no'].'_notify'), [
                'form_params' => [
                    'message' => $message
                ]
            ]);
            $body = (string)($response->getBody());
            Yii::info($body);
//            Yii::error(Yii::$app->cache->get($message['out_trade_no'].'_notify'));
            Yii::$app->cache->set($message['out_trade_no'].'_status', 'OK');
            return true;
        });
        $response->send();
    }
}