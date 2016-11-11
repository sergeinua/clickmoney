<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscriber_api".
 *
 * @property integer $id
 * @property integer $subscriber_id
 * @property integer $api_id
 * @property integer $added_at
 * @property integer $status
 */
class SubscriberApi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscriber_api';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subscriber_id', 'api_id', 'added_at'], 'required'],
            [['subscriber_id', 'api_id', 'added_at', 'status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subscriber_id' => 'Subscriber ID',
            'api_id' => 'Api ID',
            'added_at' => 'Added At',
            'status' => 'Status'
        ];
    }
}
