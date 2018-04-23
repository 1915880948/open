<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%common_datum}}".
 *
 * @property int $id
 * @property string $name 文件名
 * @property string $size 文件大小
 * @property string $video_duration 视频时长
 * @property string $uploader 上传者
 * @property int $school_id
 * @property int $classify_pid 学科大类ID
 * @property int $classify_id 学科小类ID
 * @property string $target_url 资料链接
 * @property string $share_url 转码后的链接
 * @property int $type 类型，1:公共，2:学科
 * @property int $file_type 文件类型，1；视频，2:音频，3:PPT，4:文档,5:图片
 * @property string $tag 标识上传来源
 * @property string $queue_name
 * @property string $queue_status
 * @property int $status 删除状态；0：删除；1:正常
 * @property string $create_time
 */
class CommonDatum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%common_datum}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'classify_pid', 'classify_id'], 'integer'],
            [['create_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['size', 'uploader'], 'string', 'max' => 45],
            [['video_duration', 'tag', 'queue_status'], 'string', 'max' => 20],
            [['target_url', 'share_url'], 'string', 'max' => 200],
            [['type', 'file_type', 'status'], 'string', 'max' => 1],
            [['queue_name'], 'string', 'max' => 32],
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
            'size' => 'Size',
            'video_duration' => 'Video Duration',
            'uploader' => 'Uploader',
            'school_id' => 'School ID',
            'classify_pid' => 'Classify Pid',
            'classify_id' => 'Classify ID',
            'target_url' => 'Target Url',
            'share_url' => 'Share Url',
            'type' => 'Type',
            'file_type' => 'File Type',
            'tag' => 'Tag',
            'queue_name' => 'Queue Name',
            'queue_status' => 'Queue Status',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
