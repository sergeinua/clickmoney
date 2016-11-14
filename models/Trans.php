<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trans".
 *
 * @property string $actionid
 * @property string $datetime
 * @property string $offer_name
 * @property integer $id
 * @property string $aff_id
 * @property string $aff
 */
class Trans extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trans';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['datetime'], 'safe'],
            [['actionid'], 'string', 'max' => 30],
            [['offer_name'], 'string', 'max' => 5],
            [['aff_id', 'aff'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'actionid' => 'Actionid',
            'datetime' => 'Datetime',
            'offer_name' => 'Offer Name',
            'id' => 'ID',
            'aff_id' => 'Aff ID',
            'aff' => 'Aff',
        ];
    }
}