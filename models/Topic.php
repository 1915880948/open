<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%topic}}".
 *
 * @property int $id
 * @property int $question_type 问题类型；1:单选；2:多选；3:判断，4:简答
 * @property string $uploader 上传者
 * @property string $question 问题
 * @property string $options 选项
 * @property string $answer 答案
 * @property string $resolution 题目解析
 * @property int $upload_type 上传类型；1:文本，2:图片，3:音频
 * @property int $topic_status 试题状态；1:待审核；2:审核通过，3:审核不通过
 * @property int $difficult 难度；1；简单，2:一般，3:困难
 * @property string $ps 备注
 * @property int $school_id
 * @property int $status
 * @property string $create_time
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%topic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'resolution'], 'string'],
            [['school_id'], 'integer'],
            [['create_time'], 'safe'],
            [['question_type', 'upload_type', 'topic_status', 'difficult', 'status'], 'string', 'max' => 1],
            [['uploader'], 'string', 'max' => 20],
            [['options'], 'string', 'max' => 500],
            [['ps'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_type' => 'Question Type',
            'uploader' => 'Uploader',
            'question' => 'Question',
            'options' => 'Options',
            'answer' => 'Answer',
            'resolution' => 'Resolution',
            'upload_type' => 'Upload Type',
            'topic_status' => 'Topic Status',
            'difficult' => 'Difficult',
            'ps' => 'Ps',
            'school_id' => 'School ID',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
