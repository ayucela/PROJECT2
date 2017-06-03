<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 23.02.17
 * Time: 7:34
 */

namespace app\modules\main\models;


use yii\base\ErrorException;
use yii\base\Model;

/**
 * Main search form
 */


class MainSearchForm extends Model
{
    /**
     * @var
     */
    public $destination;
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
    public $children;

    /**
     * @inheritdoc
     * Main form validation rules
     */
    public function rules()
    {
        return [
            [['destination', 'date_from', 'date_to'], 'string'],
            [['rooms', 'adults', 'children'], 'integer'],
            [['destination', 'date_from', 'date_to', 'rooms', 'adults', 'children'], 'required']
        ];
    }

    /**
     * @return array
     * Form field labels
     */
    public function attributeLabels()
    {
        return [
            'destination'=>\Yii::t('app', 'Destination'),
            'date_from'=>\Yii::t('app', 'Check In'),
            'date_to'=>\Yii::t('app', 'Check Out'),
            'rooms'=> \Yii::t('app', 'Rooms'),
            'adults'=> \Yii::t('app', 'Adults'),
            'children'=> \Yii::t('app', 'Kids'),
        ];
    }

    /**
     * Send search form.
     *
     * @return mixed redirect - when ok, false - is failed
     * @throws
     */
    public function send()
    {
        try {
            $destination = explode(';', $this->destination);

            $destination = explode('_', trim($destination[1]));
        } catch (ErrorException $exception) {
            $destination = ['', $this->destination];
        }

        if ($this->validate()) {

            $mainForm = [
                'PreviewForm' => [
                    'destination' => $destination[1],
                    'date_from' => $this->date_from,
                    'date_to' => $this->date_to,
                    'rooms' => $this->rooms,
                    'adults' => $this->adults,
                    'children' => $this->children
                ]
            ];
            $session = \Yii::$app->session;
            $session->set('main_form', $mainForm);
            return \Yii::$app->response->redirect(['/hotels/search']);

        }

        return false;
    }

}