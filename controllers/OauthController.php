<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/19
 * Time: 下午11:36
 */

namespace app\controllers;


use Yii;
use yii\web\Controller;

class OauthController extends Controller {
    public function actionCallback($state){
        $code = Yii::$app->request->get('code');
        $redirect = explode(base64_decode($state), '?');
        return $this->redirect($redirect[0] . '/oauth/callback?code=' . $code . (isset($redirect[1]) ? '&'.$redirect[1] : ''));
    }

    public function actionIndex(){
        $code = Yii::$app->request->get('code');
        $state = Yii::$app->request->get('state');
        return $this->redirect($state . '?code=' . $code);
    }
}