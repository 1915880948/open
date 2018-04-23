<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course_sale}}".
 *
 * @property int $id
 * @property int $course_id 课程ID
 * @property int $is_single_sale 是否单独分销
 * @property string $single_sale_scale 分销比例
 * @property int $is_group_sale 是否团购分销
 * @property string $group_sale_scale 团购分销比例
 */
class CourseSale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_sale}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id'], 'integer'],
            [['is_single_sale', 'is_group_sale'], 'string', 'max' => 1],
            [['single_sale_scale', 'group_sale_scale'], 'string', 'max' => 5],
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
            'is_single_sale' => 'Is Single Sale',
            'single_sale_scale' => 'Single Sale Scale',
            'is_group_sale' => 'Is Group Sale',
            'group_sale_scale' => 'Group Sale Scale',
        ];
    }
}
