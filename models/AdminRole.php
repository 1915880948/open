<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%admin_role}}".
 *
 * @property int $id
 * @property string $name 角色名
 * @property int $school_id 机构ID
 * @property string $create_time
 */
class AdminRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id'], 'integer'],
            [['create_time'], 'safe'],
            [['name'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'school_id' => 'School ID',
            'create_time' => 'Create Time',
        ];
    }
}
