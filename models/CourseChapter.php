<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%course_chapter}}".
 *
 * @property int $id
 * @property int $course_id
 * @property int $pid
 * @property string $name
 * @property int $video
 * @property int $type 课程类型：1:视频；2:文本；3音频；4:PPT
 * @property int $is_free 是否免费；默认收费
 * @property int $datum_id 资料ID(暂定不使用)
 * @property int $paper_id 试卷ID
 * @property string $introduction 简介
 * @property int $look_num 观看量
 * @property int $shelf_status 上架状态，0:下架，1:上架，-1:草稿
 * @property int $status
 * @property string $create_time
 */
class CourseChapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%course_chapter}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'pid', 'video', 'datum_id', 'paper_id', 'look_num'], 'integer'],
            [['create_time'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['type', 'is_free', 'shelf_status', 'status'], 'string', 'max' => 1],
            [['introduction'], 'string', 'max' => 500],
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
            'pid' => 'Pid',
            'name' => 'Name',
            'video' => 'Video',
            'type' => 'Type',
            'is_free' => 'Is Free',
            'datum_id' => 'Datum ID',
            'paper_id' => 'Paper ID',
            'introduction' => 'Introduction',
            'look_num' => 'Look Num',
            'shelf_status' => 'Shelf Status',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
