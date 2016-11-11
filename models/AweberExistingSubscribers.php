<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aweber_existing_subscribers".
 *
 * @property integer $id
 * @property string $list_id
 * @property string $email
 * @property string $status
 * @property integer $updated_at
 */
class AweberExistingSubscribers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aweber_existing_subscribers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['list_id', 'email', 'status', 'updated_at'], 'required'],
            [['updated_at'], 'integer'],
            [['list_id', 'email'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list_id' => 'List ID',
            'email' => 'Email',
            'status' => 'Status',
            'updated_at' => 'Updated At',
        ];
    }
}
