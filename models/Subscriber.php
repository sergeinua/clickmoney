<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sf_all_adds".
 *
 * @property integer $id
 * @property string $info_user
 * @property string $page_type
 * @property string $ip
 * @property integer $created_at
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sf_all_adds';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['info_user', 'page_type', 'ip'], 'required'],
            [['created_at'], 'string'],
            [['info_user', 'ip'], 'string', 'max' => 255],
            [['page_type'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'info_user' => 'Info User',
            'page_type' => 'Page Type',
            'ip' => 'Ip',
            'created_at' => 'Created At',
        ];
    }
}
