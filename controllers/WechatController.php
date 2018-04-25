<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/26
 * Time: 上午1:48
 */

namespace app\controllers;


use app\common\wechat\Weixin;
use yii\web\Controller;

class WechatController extends Controller {
    public function actionConfig(){
        $app = Weixin::getApp();
        $config = $app->jssdk->buildConfig(['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage',
            'menuItem:profile','menuItem:addContact','menuItem:share:appMessage','menuItem:share:timeline','chooseWXPay',"chooseImage", "previewImage", "uploadImage", "downloadImage",
            'startRecord', 'stopRecord', 'onVoiceRecordEnd', 'playVoice', 'pauseVoice', 'uploadVoice']);
        return $config;
    }
}