<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course_classify}}".
 *
 * @property int $id
 * @property int $pid 学科分类父类的ID，为0表示记录为父类
 * @property string $name 分类的名字
 * @property string $logo 图标地址
 * @property int $sort 排序
 * @property int $school_id
 * @property int $status 删除状态，默认为1，0表示已删除
 * @property int $shelf_status 上架状态，默认为0 表示下架
 * @property string $create_time 创建时间
 */
class CourseClassify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_classify}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'sort', 'school_id'], 'integer'],
            [['create_time'], 'safe'],
            [['name'], 'string', 'max' => 20],
            [['logo'], 'string', 'max' => 200],
            [['status', 'shelf_status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'name' => 'Name',
            'logo' => 'Logo',
            'sort' => 'Sort',
            'school_id' => 'School ID',
            'status' => 'Status',
            'shelf_status' => 'Shelf Status',
            'create_time' => 'Create Time',
        ];
    }
}
