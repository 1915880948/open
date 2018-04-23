<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%group_order}}".
 *
 * @property int $id
 * @property int $school_id 机构ID
 * @property int $uid 发起人id
 * @property int $group_id 团购id
 * @property int $course_id 课程ID
 * @property int $price 原价
 * @property int $group_price 团购价
 * @property string $start_time 团购开始时间
 * @property string $end_time 团购结束时间
 * @property int $group_total 团购人数
 * @property int $current_total 参团人数
 * @property string $create_time 创建时间
 * @property int $status 状态：1:正常：0:删除
 */
class GroupOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%group_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'uid', 'course_id'], 'required'],
            [['school_id', 'uid', 'group_id', 'course_id', 'price', 'group_price', 'group_total', 'current_total'], 'integer'],
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
            'school_id' => 'School ID',
            'uid' => 'Uid',
            'group_id' => 'Group ID',
            'course_id' => 'Course ID',
            'price' => 'Price',
            'group_price' => 'Group Price',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'group_total' => 'Group Total',
            'current_total' => 'Current Total',
            'create_time' => 'Create Time',
            'status' => 'Status',
        ];
    }
}
