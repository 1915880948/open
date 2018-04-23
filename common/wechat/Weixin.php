<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/19
 * Time: 下午11:31
 */

namespace app\common\wechat;


use EasyWeChat\Factory;
use EasyWeChat\Work\Application;

class Weixin {
    public static function getApp() {
        return Factory::officialAccount(self::getOptions());
    }

    public static function getPayment(){
        return Factory::payment(self::getOptions());
    }

    protected static function getOptions() {
        $wx = \Yii::$app->params['Weixin'];
        return [
            'debug' => true,
            'app_id' => $wx['Weixin_App_ID'],
            'secret' => $wx['Weixin_App_Secret'],
            'token' => '',
            'aes_key' => '', // 可选
            'log' => [
                'level' => 'debug',
                'file' => sys_get_temp_dir() . '/easywechat.log', // XXX: 绝对路径！！！！
            ],
            'payment' => [
                'merchant_id' => $wx['Weixin_Payment'],
                'key' => $wx['Weixin_Payment_Key'],
            ],
//            'oauth' => [
//                'scopes'   => ['snsapi_userinfo'],
//                'callback' => '/oauth/callback',
//            ],
        ];
    }
}