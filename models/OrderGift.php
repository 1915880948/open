<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%order_gift}}".
 *
 * @property int $id
 * @property int $school_id 机构ID
 * @property int $course_id 课程ID
 * @property int $from_uid 赠送人ID
 * @property string $from_name 赠送人姓名
 * @property string $from_phone 赠送人电话
 * @property int $to_uid 领取人ID
 * @property string $to_name 领取人姓名
 * @property string $to_phone 领取人电话
 * @property string $address 省市县
 * @property string $address_detail 地址详情
 * @property int $address_code 地址code
 * @property int $status 状态：1正常（默认）0:删除
 * @property string $custom_sign 自定义签名
 * @property string $receive_time 领取时间
 * @property string $create_time 创建时间
 */
class OrderGift extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_gift}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'course_id', 'from_uid', 'to_phone', 'status'], 'required'],
            [['school_id', 'course_id', 'from_uid', 'to_uid', 'address_code'], 'integer'],
            [['receive_time', 'create_time'], 'safe'],
            [['from_name', 'from_phone', 'to_name', 'to_phone'], 'string', 'max' => 20],
            [['address', 'address_detail', 'custom_sign'], 'string', 'max' => 50],
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
            'from_uid' => 'From Uid',
            'from_name' => 'From Name',
            'from_phone' => 'From Phone',
            'to_uid' => 'To Uid',
            'to_name' => 'To Name',
            'to_phone' => 'To Phone',
            'address' => 'Address',
            'address_detail' => 'Address Detail',
            'address_code' => 'Address Code',
            'status' => 'Status',
            'custom_sign' => 'Custom Sign',
            'receive_time' => 'Receive Time',
            'create_time' => 'Create Time',
        ];
    }
}
