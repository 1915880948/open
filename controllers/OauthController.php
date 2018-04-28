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
        $urls = parse_url($redirect);
        $sub = explode('/', $urls['path']);
        var_dump($redirect);
        var_dump($sub);
        var_dump($urls);die;
        if(isset($urls['query'])){
            return $this->redirect("{$urls['scheme']}://{$urls['host']}/{$sub}/oauth/callback?{$urls['query']}&code={$code}");
        }
        return $this->redirect("{$urls['scheme']}://{$urls['host']}/{$sub}/oauth/callback?code={$code}");
    }

    public function actionIndex(){
        $code = Yii::$app->request->get('code');
        $state = Yii::$app->request->get('state');
        return $this->redirect($state . '?code=' . $code);
    }
}