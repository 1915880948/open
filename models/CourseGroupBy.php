<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course_group_by}}".
 *
 * @property int $id
 * @property int $course_id 课程ID
 * @property int $total_people 团购人数
 * @property int $price 团购价格
 * @property string $start_time 开始时间
 * @property string $end_time 结束时间
 * @property int $status
 * @property string $create_time
 */
class CourseGroupBy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_group_by}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'total_people', 'price'], 'integer'],
            [['start_time', 'end_time', 'create_time'], 'safe'],
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
            'course_id' => 'Course ID',
            'total_people' => 'Total People',
            'price' => 'Price',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
