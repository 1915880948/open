<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course_datum}}".
 *
 * @property int $id
 * @property int $datum_id
 * @property int $course_id
 * @property int $status
 */
class CourseDatum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_datum}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datum_id', 'course_id'], 'integer'],
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
            'datum_id' => 'Datum ID',
            'course_id' => 'Course ID',
            'status' => 'Status',
        ];
    }
}
