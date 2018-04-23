<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user_login}}".
 *
 * @property int $id
 * @property string $uid
 * @property string $token
 * @property string $login_time
 */
class UserLogin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_login}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'token'], 'required'],
            [['login_time'], 'safe'],
            [['uid'], 'string', 'max' => 50],
            [['token'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'token' => 'Token',
            'login_time' => 'Login Time',
        ];
    }
}
