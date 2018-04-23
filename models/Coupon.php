<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%coupon}}".
 *
 * @property int $id
 * @property string $name 优惠券名
 * @property int $school_id
 * @property int $total_money 满金额
 * @property int $receive_money 减金额
 * @property int $coupon_type 0:通用券；1:专用券（限定某一个课程使用）
 * @property int $target_id 指向的课程ID
 * @property int $is_limit_time 是否限时，默认不限时，1:限时
 * @property int $count 优惠券数量
 * @property string $send_start_date 发放开始时间
 * @property string $send_end_date 发放结束时间
 * @property string $use_start_date 使用开始时间
 * @property string $use_end_date 使用结束时间
 * @property int $shelf_status 优惠券上下架状态，默认下架
 * @property int $status
 * @property string $create_time
 */
class Coupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%coupon}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'total_money', 'receive_money', 'target_id', 'count'], 'integer'],
            [['send_start_date', 'send_end_date', 'use_start_date', 'use_end_date', 'create_time'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['coupon_type', 'is_limit_time', 'shelf_status', 'status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'school_id' => 'School ID',
            'total_money' => 'Total Money',
            'receive_money' => 'Receive Money',
            'coupon_type' => 'Coupon Type',
            'target_id' => 'Target ID',
            'is_limit_time' => 'Is Limit Time',
            'count' => 'Count',
            'send_start_date' => 'Send Start Date',
            'send_end_date' => 'Send End Date',
            'use_start_date' => 'Use Start Date',
            'use_end_date' => 'Use End Date',
            'shelf_status' => 'Shelf Status',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
