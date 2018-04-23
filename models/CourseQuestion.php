<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course_question}}".
 *
 * @property int $id
 * @property int $school_id 机构ID
 * @property int $course_id
 * @property int $uid
 * @property string $question
 * @property string $answer
 * @property int $status
 * @property string $create_time
 */
class CourseQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_question}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'course_id', 'uid'], 'integer'],
            [['create_time'], 'safe'],
            [['question', 'answer'], 'string', 'max' => 300],
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
            'course_id' => 'Course ID',
            'uid' => 'Uid',
            'question' => 'Question',
            'answer' => 'Answer',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
