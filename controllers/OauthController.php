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
        $redirect = base64_decode($state);
//        var_dump($redirect);die;
        $urls = explode('?', $redirect);
        if(isset($urls[1])){
            return $this->redirect($urls[0].'/oauth/callback?'. $urls[1].'&code='. $code);
        }
        return $this->redirect($redirect . '/oauth/callback?code=' . $code);
    }

    public function actionIndex(){
        $code = Yii::$app->request->get('code');
        $state = Yii::$app->request->get('state');
        return $this->redirect($state . '?code=' . $code);
    }
}