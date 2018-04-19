<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/19
 * Time: 下午11:33
 */

namespace app\controllers;


use app\common\wechat\Weixin;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class UserController extends Controller {
    public function actionLogin(){
        $redirect = Yii::$app->request->get('redirect');
        $app = Weixin::getApp();
        $response = $app->oauth->scopes(['snsapi_userinfo'])
            ->redirect();
//        Url::to(['/oauth/callback', 'state' => base64_encode($redirect)], true)
        return $response->send();
    }
}