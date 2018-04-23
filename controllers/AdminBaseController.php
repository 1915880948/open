<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/3/13
 * Time: 下午4:26
 */

namespace app\controllers\api;

header("Access-Control-Allow-Method:POST,GET,OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Token");
header("Access-Control-Allow-Credentials: true");

use app\common\UserHelper;
use Yii;
use yii\base\Exception;
use yii\web\Controller;

class AdminBaseController extends Controller {
    public function init() {
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

        $allow_origin = [
            'http://localhost:8080',
            'http://kaixin.guaschool.com'
        ];
        if (in_array($origin, $allow_origin)) {
            header('Access-Control-Allow-Origin:' . $origin);
        }
        if (Yii::$app->request->getIsOptions()) {
            exit;
        }
        $this->enableCsrfValidation = false;
//        if (!UserHelper::checkToken(Yii::$app->request->headers->get('Token'))) {
//            throw new Exception('Invalid Token', 403);
//        }
        parent::init(); // TODO: Change the autogenerated stub
    }
}