<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin_permission}}".
 *
 * @property int $id
 * @property int $pid
 * @property string $name
 * @property string $route
 * @property string $icon
 * @property int $sort
 * @property int $status
 */
class AdminPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_permission}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'sort'], 'integer'],
            [['name', 'route', 'icon'], 'string', 'max' => 20],
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
            'pid' => 'Pid',
            'name' => 'Name',
            'route' => 'Route',
            'icon' => 'Icon',
            'sort' => 'Sort',
            'status' => 'Status',
        ];
    }
}
