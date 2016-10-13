<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trans".
 *
 * @property string $trans
 * @property string $aff_if
 * @property string $actionid
 * @property string $datetime
 * @property string $offer_name
 * @property integer $id
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
            [['trans'], 'required'],
            [['datetime'], 'safe'],
            [['trans'], 'string', 'max' => 256],
            [['aff_if'], 'string', 'max' => 255],
            [['actionid'], 'string', 'max' => 30],
            [['offer_name'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'trans' => 'Trans',
            'aff_if' => 'Aff If',
            'actionid' => 'Actionid',
            'datetime' => 'Datetime',
            'offer_name' => 'Offer Name',
            'id' => 'ID',
        ];
    }
}
