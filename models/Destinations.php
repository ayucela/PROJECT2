<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ycl_destinations".
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $country_code
 * @property string $code
 * @property string $name_en
 *
 * @property Countries $country
 * @property Zones[] $zones
 */
class Destinations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%destinations}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id'], 'integer'],
            [['country_code'], 'string', 'max' => 3],
            [['code'], 'string', 'max' => 4],
            [['name_en'], 'string', 'max' => 255],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'country_id' => 'Country ID',
            'country_code' => 'Country Code',
            'code' => 'Code',
            'name_en' => 'Name En',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Countries::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getZones()
    {
        return $this->hasMany(Zones::className(), ['destination_id' => 'id']);
    }
}
