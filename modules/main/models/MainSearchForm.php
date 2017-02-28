<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 23.02.17
 * Time: 7:34
 */

namespace app\modules\main\models;


use yii\base\Model;

/**
 * Main search form
 */


class MainSearchForm extends Model
{
    /**
     * @var
     */
    public $hotels;
    /**
     * @var
     */
    public $date_from;
    /**
     * @var
     */
    public $date_to;
    /**
     * @var
     */
    public $rooms;
    /**
     * @var
     */
    public $adults;
    /**
     * @var
     */
    public $kids;

    /**
     * @inheritdoc
     * Main form validation rules
     */
    public function rules()
    {
        return [
            [['hotels', 'date_from', 'date_to'], 'string'],
            [['rooms', 'adults', 'kids'], 'integer'],
            [['hotels', 'date_from', 'date_to', 'rooms', 'adults', 'kids'], 'required']
        ];
    }

    /**
     * @return array
     * Form field labels
     */
    public function attributeLabels()
    {
        return [
            'hotels'=>\Yii::t('app', 'Destination'),
            'date_from'=>\Yii::t('app', 'Check In'),
            'date_to'=>\Yii::t('app', 'Check Out'),
            'rooms'=> \Yii::t('app', 'Rooms'),
            'adults'=> \Yii::t('app', 'Adults'),
            'kids'=> \Yii::t('app', 'Kids'),
        ];
    }

    /**
     * Send search form.
     *
     * @return mixed redirect - when ok, false - is failed
     * @throws
     */
    public function send()
    :bool {
        if ($this->validate()) {


            \Yii::$app->response->redirect(['hotels/search',

                'hotels' => ["hotel" => [1067,1070,1075,135813,145214,1506,1508,1526,1533,1539,1550,161032,170542,182125,187939,212167,215417,228671,229318,23476] ],
                'date_from' => $this->date_from,
                'date_to' => $this->date_to,
                'rooms' => $this->rooms,
                'adults' => $this->adults,
                'kids' => $this->kids
            ]);

        }

        return false;
    }

}