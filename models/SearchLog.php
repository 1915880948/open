<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%search_log}}".
 *
 * @property int $id
 * @property int $uid
 * @property int $school_id 机构ID
 * @property string $keyword 关键字
 * @property int $status 状态：1正常（默认）。0:删除
 * @property string $create_time 搜索时间
 */
class SearchLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%search_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'school_id'], 'integer'],
            [['create_time'], 'safe'],
            [['keyword'], 'string', 'max' => 50],
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
            'school_id' => 'School ID',
            'keyword' => 'Keyword',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
