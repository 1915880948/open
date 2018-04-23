<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%role_map_permission}}".
 *
 * @property int $id
 * @property int $role_id
 * @property int $permission_id
 * @property string $create_time
 */
class RoleMapPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role_map_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'permission_id'], 'integer'],
            [['create_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'permission_id' => 'Permission ID',
            'create_time' => 'Create Time',
        ];
    }
}
