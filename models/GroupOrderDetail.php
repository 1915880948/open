<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%group_order_detail}}".
 *
 * @property int $id
 * @property int $school_id 机构ID
 * @property int $uid 参与uid
 * @property int $course_id 课程ID
 * @property int $group_order_id 团购订单ID
 * @property string $contact_name 联系人
 * @property string $contact_phone 电话
 * @property int $original_price 原价
 * @property int $group_price 团购价
 * @property int $price 实际支付价格
 * @property string $address 省市县
 * @property string $address_detail 地址详情
 * @property int $address_code 地址code
 * @property int $coupon_id 优惠卷ID
 * @property int $is_initiator 是否是发起人：1:是。0:否（默认）
 * @property string $create_time 创建时间
 * @property int $status 状态：1正常（默认）0:删除
 * @property string $update_time 参团更新时间
 */
class GroupOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%group_order_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'uid', 'course_id', 'group_order_id', 'original_price', 'group_price', 'price', 'address_code', 'coupon_id'], 'integer'],
            [['uid', 'course_id'], 'required'],
            [['create_time', 'update_time'], 'safe'],
            [['contact_name', 'contact_phone'], 'string', 'max' => 20],
            [['address', 'address_detail'], 'string', 'max' => 50],
            [['is_initiator', 'status'], 'string', 'max' => 1],
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
            'course_id' => 'Course ID',
            'group_order_id' => 'Group Order ID',
            'contact_name' => 'Contact Name',
            'contact_phone' => 'Contact Phone',
            'original_price' => 'Original Price',
            'group_price' => 'Group Price',
            'price' => 'Price',
            'address' => 'Address',
            'address_detail' => 'Address Detail',
            'address_code' => 'Address Code',
            'coupon_id' => 'Coupon ID',
            'is_initiator' => 'Is Initiator',
            'create_time' => 'Create Time',
            'status' => 'Status',
            'update_time' => 'Update Time',
        ];
    }
}
