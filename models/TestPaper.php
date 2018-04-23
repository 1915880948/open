<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%test_paper}}".
 *
 * @property int $id
 * @property string $paper_name
 * @property string $answer_time
 * @property int $total_score
 * @property string $containe_question_type
 * @property int $paper_status 状态；1:待审核，2:审核通过，3:审核不通过
 * @property int $school_id
 * @property int $status
 * @property string $create_time
 */
class TestPaper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test_paper}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['total_score', 'school_id'], 'integer'],
            [['create_time'], 'safe'],
            [['paper_name'], 'string', 'max' => 30],
            [['answer_time'], 'string', 'max' => 10],
            [['containe_question_type'], 'string', 'max' => 50],
            [['paper_status', 'status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'paper_name' => 'Paper Name',
            'answer_time' => 'Answer Time',
            'total_score' => 'Total Score',
            'containe_question_type' => 'Containe Question Type',
            'paper_status' => 'Paper Status',
            'school_id' => 'School ID',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
