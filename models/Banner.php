<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%banner}}".
 *
 * @property int $id
 * @property int $school_id 机构ID
 * @property string $picture
 * @property string $target_url
 * @property int $sort
 * @property string $ps 备注
 * @property int $status
 * @property string $create_time
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%banner}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'sort'], 'integer'],
            [['create_time'], 'safe'],
            [['picture'], 'string', 'max' => 100],
            [['target_url'], 'string', 'max' => 300],
            [['ps'], 'string', 'max' => 30],
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
            'school_id' => 'School ID',
            'picture' => 'Picture',
            'target_url' => 'Target Url',
            'sort' => 'Sort',
            'ps' => 'Ps',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
