<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%guagua_order}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $contact_name 联系人
 * @property string $contact_phone 联系手机号
 * @property string $address_detail 地址详情
 * @property string $address 省市县
 * @property int $address_code 地址code
 * @property int $course_id 课程ID
 * @property int $amount 购买数量
 * @property int $coupon_id 优惠券ID
 * @property string $ps 备注
 * @property int $price 支付价格
 * @property int $is_pay 是否支付。1:支付。0:未支付（默认）
 * @property string $out_trade_no 微信支付订单号
 * @property string $pay_time 支付时间
 * @property string $response 微信支付回调信息
 * @property int $school_id 机构ID
 * @property int $gift_type 礼包类型，0:直接购买，1:赠送。2:领取。3赠送和领取
 * @property int $gift_order_id 赠送订单ID
 * @property int $group_order_id 团购订单ID，用于判断、反查
 * @property int $status
 * @property string $create_time
 */
class GuaguaOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%guagua_order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'address_code', 'course_id', 'amount', 'coupon_id', 'price', 'school_id', 'gift_order_id', 'group_order_id'], 'integer'],
            [['ps'], 'string'],
            [['pay_time', 'create_time'], 'safe'],
            [['contact_name', 'contact_phone'], 'string', 'max' => 20],
            [['address_detail', 'address', 'out_trade_no'], 'string', 'max' => 50],
            [['is_pay', 'gift_type', 'status'], 'string', 'max' => 1],
            [['response'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'contact_name' => 'Contact Name',
            'contact_phone' => 'Contact Phone',
            'address_detail' => 'Address Detail',
            'address' => 'Address',
            'address_code' => 'Address Code',
            'course_id' => 'Course ID',
            'amount' => 'Amount',
            'coupon_id' => 'Coupon ID',
            'ps' => 'Ps',
            'price' => 'Price',
            'is_pay' => 'Is Pay',
            'out_trade_no' => 'Out Trade No',
            'pay_time' => 'Pay Time',
            'response' => 'Response',
            'school_id' => 'School ID',
            'gift_type' => 'Gift Type',
            'gift_order_id' => 'Gift Order ID',
            'group_order_id' => 'Group Order ID',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
