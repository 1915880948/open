<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course}}".
 *
 * @property int $id
 * @property string $title 课程名称
 * @property string $cover_picture 课程封面图
 * @property string $back_picture 课程背景图
 * @property string $summary 概要
 * @property string $age_tag 年龄段标签
 * @property int $video 试听视频
 * @property int $single_video 单视频课程
 * @property string $start_time 开课时间
 * @property string $end_time 结束时间
 * @property int $school_id 学校ID
 * @property int $teacher_id 老师ID
 * @property int $classify_id 分类ID
 * @property int $price 定价
 * @property int $discount_price 优惠价格
 * @property int $total_num 购买基数
 * @property int $total_hours 总课时
 * @property int $is_textbook 是否有教材
 * @property int $textbook_price 教材价格
 * @property int $type 课程类型，1:直播，2:录播，3:面授，4:混合，5:其他
 * @property string $guide 须知
 * @property string $rich_text 富文本内容
 * @property string $qa QA
 * @property int $look_num 浏览数
 * @property int $shelf_status 上架状态
 * @property int $is_hot 是否热卖：1：是。0：否
 * @property int $is_good 是否精品：1，是。0：否
 * @property int $status
 * @property string $create_time 创建时间
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video', 'single_video', 'school_id', 'teacher_id', 'classify_id', 'price', 'discount_price', 'total_num', 'total_hours', 'textbook_price', 'look_num'], 'integer'],
            [['start_time', 'end_time', 'create_time'], 'safe'],
            [['guide', 'rich_text', 'qa'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['cover_picture', 'back_picture'], 'string', 'max' => 200],
            [['summary'], 'string', 'max' => 300],
            [['age_tag'], 'string', 'max' => 100],
            [['is_textbook', 'type', 'shelf_status', 'is_hot', 'is_good', 'status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cover_picture' => 'Cover Picture',
            'back_picture' => 'Back Picture',
            'summary' => 'Summary',
            'age_tag' => 'Age Tag',
            'video' => 'Video',
            'single_video' => 'Single Video',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'school_id' => 'School ID',
            'teacher_id' => 'Teacher ID',
            'classify_id' => 'Classify ID',
            'price' => 'Price',
            'discount_price' => 'Discount Price',
            'total_num' => 'Total Num',
            'total_hours' => 'Total Hours',
            'is_textbook' => 'Is Textbook',
            'textbook_price' => 'Textbook Price',
            'type' => 'Type',
            'guide' => 'Guide',
            'rich_text' => 'Rich Text',
            'qa' => 'Qa',
            'look_num' => 'Look Num',
            'shelf_status' => 'Shelf Status',
            'is_hot' => 'Is Hot',
            'is_good' => 'Is Good',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
