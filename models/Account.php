<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%account}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $openid
 * @property string $head_pic
 * @property string $nickname
 * @property string $realname 真实姓名
 * @property string $sex 性别
 * @property string $born 出生日期
 * @property string $phone 手机号码
 * @property int $status
 * @property string $updated_at
 * @property string $create_time
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%account}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'integer'],
            [['born', 'updated_at', 'create_time'], 'safe'],
            [['openid', 'head_pic'], 'string', 'max' => 255],
            [['nickname', 'realname'], 'string', 'max' => 30],
            [['sex'], 'string', 'max' => 2],
            [['phone'], 'string', 'max' => 15],
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
            'uid' => 'Uid',
            'openid' => 'Openid',
            'head_pic' => 'Head Pic',
            'nickname' => 'Nickname',
            'realname' => 'Realname',
            'sex' => 'Sex',
            'born' => 'Born',
            'phone' => 'Phone',
            'status' => 'Status',
            'updated_at' => 'Updated At',
            'create_time' => 'Create Time',
        ];
    }
}
