<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username 用户名
 * @property string $email
 * @property string $phone 手机号
 * @property string $portrait 头像地址
 * @property int $credits 积分
 * @property int $status
 * @property string $create_time
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['credits'], 'integer'],
            [['create_time'], 'safe'],
            [['username'], 'string', 'max' => 16],
            [['email'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 32],
            [['portrait'], 'string', 'max' => 300],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'phone' => 'Phone',
            'portrait' => 'Portrait',
            'credits' => 'Credits',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }

    public function create($info)
    {
        if($info['account_id'] && $info['username'] && $info['phone']){
            $model = new User();
            $model->username = $info['username'];
            $model->phone = $info['phone'];
            $model->create_time = date("Y-m-d H:i:s");
            if( $model->save() ){
                $account = Account::findOne(['id'=>$info['account_id']]);
                $account->uid = $model->attributes['id'];
                $account->phone = $info['phone'];
                $account->save();
                return true;
            }
            return $model->getErrors();
        }
        return false;
    }
}
