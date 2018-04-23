<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%teacher}}".
 *
 * @property int $id
 * @property string $name
 * @property string $portrait
 * @property string $title
 * @property string $introduction 简介
 * @property string $idcard
 * @property int $school_id
 * @property int $status
 * @property string $create_time
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id'], 'integer'],
            [['create_time'], 'safe'],
            [['name', 'title'], 'string', 'max' => 50],
            [['portrait', 'introduction'], 'string', 'max' => 300],
            [['idcard'], 'string', 'max' => 30],
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
            'portrait' => 'Portrait',
            'title' => 'Title',
            'introduction' => 'Introduction',
            'idcard' => 'Idcard',
            'school_id' => 'School ID',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
