<?php
/**
 * Created by PhpStorm.
 * User: jun
 * Date: 2018/4/26
 * Time: 上午1:30
 */

namespace app\controllers;


use yii\web\Controller;

class MenuController extends Controller {
    public function actionShare(){
        return $this->render('share');
    }
}