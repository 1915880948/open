<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course_study}}".
 *
 * @property int $id
 * @property int $course_id 课程ID
 * @property int $uid
 * @property int $chapter_id 章节ID
 * @property int $section_id
 * @property string $chapter_name 章节名
 * @property int $is_complete 是否学习完此章节
 * @property int $status
 * @property string $create_time
 */
class CourseStudy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_study}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'uid', 'chapter_id', 'section_id'], 'integer'],
            [['create_time'], 'safe'],
            [['chapter_name'], 'string', 'max' => 50],
            [['is_complete', 'status'], 'string', 'max' => 1],
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
            'uid' => 'Uid',
            'chapter_id' => 'Chapter ID',
            'section_id' => 'Section ID',
            'chapter_name' => 'Chapter Name',
            'is_complete' => 'Is Complete',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
