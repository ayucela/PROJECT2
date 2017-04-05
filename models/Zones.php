<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%zones}}".
 *
 * @property integer $id
 * @property integer $destination_id
 * @property string $destination_code
 * @property integer $code
 * @property string $name_en
 *
 * @property Destinations $destination
 */
class Zones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%zones}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['destination_id', 'code'], 'integer'],
            [['destination_code'], 'string', 'max' => 4],
            [['name_en'], 'string', 'max' => 255],
            [['destination_id'], 'exist', 'skipOnError' => true, 'targetClass' => Destinations::className(), 'targetAttribute' => ['destination_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'destination_id' => 'Destination ID',
            'destination_code' => 'Destination Code',
            'code' => 'Code',
            'name_en' => 'Name En',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestination()
    {
        return $this->hasOne(Destinations::className(), ['id' => 'destination_id']);
    }
}
