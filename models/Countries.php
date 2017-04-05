<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%countries}}".
 *
 * @property integer $id
 * @property string $code
 * @property string $name_en
 *
 * @property Destinations[] $destinations
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%countries}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 3],
            [['name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name_en' => 'Name En',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDestinations()
    {
        return $this->hasMany(Destinations::className(), ['country_id' => 'id']);
    }
}
