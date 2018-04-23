<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%coupon_list}}".
 *
 * @property int $id
 * @property string $number 优惠券编号
 * @property int $coupon_id 优惠券ID
 * @property int $user_id 使用人ID
 * @property string $use_time 使用时间
 * @property string $create_time
 */
class CouponList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%coupon_list}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coupon_id', 'user_id'], 'integer'],
            [['use_time', 'create_time'], 'safe'],
            [['number'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'coupon_id' => 'Coupon ID',
            'user_id' => 'User ID',
            'use_time' => 'Use Time',
            'create_time' => 'Create Time',
        ];
    }
}
