<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%paper_map_topic}}".
 *
 * @property int $id
 * @property int $topic_id 试题ID
 * @property int $paper_id 试卷ID
 * @property int $score 题目得分
 * @property int $status
 * @property string $create_time
 */
class PaperMapTopic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%paper_map_topic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id', 'paper_id', 'score'], 'integer'],
            [['create_time'], 'safe'],
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
            'topic_id' => 'Topic ID',
            'paper_id' => 'Paper ID',
            'score' => 'Score',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
