<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%homework_write}}".
 *
 * @property int $id
 * @property int $course_id
 * @property int $section_id 章节ID
 * @property int $uid
 * @property int $paper_id 试卷ID
 * @property int $topic_id 试题ID
 * @property string $answer 答案
 * @property int $answer_type 答案类型；1:文本；2:图片；3:音频
 * @property int $teacher_id 老师
 * @property int $score 得分
 * @property string $remark 评语
 * @property int $status
 * @property string $create_time
 */
class HomeworkWrite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%homework_write}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'section_id', 'uid', 'paper_id', 'topic_id', 'teacher_id', 'score'], 'integer'],
            [['create_time'], 'safe'],
            [['answer'], 'string', 'max' => 300],
            [['answer_type', 'status'], 'string', 'max' => 1],
            [['remark'], 'string', 'max' => 100],
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
            'uid' => 'Uid',
            'paper_id' => 'Paper ID',
            'topic_id' => 'Topic ID',
            'answer' => 'Answer',
            'answer_type' => 'Answer Type',
            'teacher_id' => 'Teacher ID',
            'score' => 'Score',
            'remark' => 'Remark',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
