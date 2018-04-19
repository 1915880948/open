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
    public function actionCallback(){
        $code = Yii::$app->request->get('code');
        $state = Yii::$app->request->get('state');
        return $this->redirect($state . '?code=' . $code);
    }
}