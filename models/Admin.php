<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $role_id
 * @property int $school_id 机构ID
 * @property int $is_super 是否是超级管理员
 * @property int $is_system 是否是系统管理员
 * @property int $status
 * @property string $create_time
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'school_id'], 'integer'],
            [['create_time'], 'safe'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 40],
            [['is_super', 'is_system', 'status'], 'string', 'max' => 1],
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
            'password' => 'Password',
            'role_id' => 'Role ID',
            'school_id' => 'School ID',
            'is_super' => 'Is Super',
            'is_system' => 'Is System',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
