<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%homework_log}}".
 *
 * @property int $id
 * @property int $course_id 课程ID
 * @property int $section_id 章节ID
 * @property int $paper_id 试卷ID
 * @property int $uid 用户ID
 * @property int $read_status 作业批阅状态;1:待批阅，2:已批阅
 * @property int $status
 * @property string $create_time
 */
class HomeworkLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%homework_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'section_id', 'paper_id', 'uid'], 'integer'],
            [['create_time'], 'safe'],
            [['read_status', 'status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'section_id' => 'Section ID',
            'paper_id' => 'Paper ID',
            'uid' => 'Uid',
            'read_status' => 'Read Status',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
