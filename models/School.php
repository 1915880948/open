<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%school}}".
 *
 * @property int $id
 * @property string $name
 * @property string $web_url 前台地址
 * @property string $summary
 * @property string $build_time 建校时间
 * @property int $status
 * @property string $create_time
 */
class School extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%school}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['build_time', 'create_time'], 'safe'],
            [['name'], 'string', 'max' => 30],
            [['web_url'], 'string', 'max' => 100],
            [['summary'], 'string', 'max' => 300],
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
            'name' => 'Name',
            'web_url' => 'Web Url',
            'summary' => 'Summary',
            'build_time' => 'Build Time',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
