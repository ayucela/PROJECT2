<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 24.03.17
 * Time: 14:46
 */

namespace app\modules\main\models;


use app\components\hotels\ApiClient;
use app\components\hotels\queries\types\BookingApiQuery;
use yii\base\Model;

class BookingForm extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $emailConfirm;
    public $countryCode;
    public $phoneNumber;
    public $creditCardType;
    public $cardHolderName;
    public $cardNumber;
    public $cardIdentificationNumber;
    public $expirationDateMonth;
    public $expirationDateYear;
    public $billingZipCode;
    public $promoOffer;
    public $term;
    public $rateKey;

    public function rules()
    {
        return [
            [['firstname', 'lastname', 'email', 'countryCode', 'phoneNumber',
                'creditCardType', 'cardHolderName', 'cardNumber', 'cardIdentificationNumber',
            'expirationDateMonth', 'expirationDateYear', 'promoOffer', 'term'], 'required'],
            [['firstname', 'lastname', 'phoneNumber', 'expirationDateMonth',
                'expirationDateYear',], 'string', 'max'=>255],
            [['cardNumber', 'cardIdentificationNumber', 'promoOffer',
                'term', 'billingZipCode', 'countryCode'], 'integer'],
            ['email', 'email'],
            ['emailConfirm', 'required', 'when' => function($model) {
                return !empty($model->emailConfirm);
            }],
            ['emailConfirm', 'compare', 'compareAttribute' => 'email', 'skipOnEmpty' => false],
        ];
    }

    public function attributeLabels()
    {
        return [
            'firstname'=>'First Name',
            'lastname'=>'Last Name',
            'email'=> 'Email',
            'emailConfirm'=> 'Confirm Email',
            'phoneNumber'=>'Phone Number',
            'creditCardType'=>'Credit Card Type',
            'cardHolderName' => 'Card Holder Name',
            'cardNumber' => 'Card Number',
            'cardIdentificationNumber' => 'Card Identification Number',
            'expirationDateMonth' => 'Expiration Date Month',
            'expirationDateYear' => 'Expiration Date Year',
            'billingZipCode'=>'Zip Code',
            'promoOffer' => 'Promo Offer',
            'term' => 'Term'
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['AT_WEB'] = ['firstname', 'lastname', 'email', 'emailConfirm', 'phoneNumber',
        'promoOffer', 'term'];
        return $scenarios;
    }

    public function send()
    {
        if($this->validate()){
            $response = ApiClient::query(BookingApiQuery::className())
                ->addHolder(\Yii::createObject([
                    'class'=>'app\components\hotels\queries\booking\Holder',
                    'name' => $this->firstname,
                    'surname' => $this->lastname
                ]))
                ->addRoom(\Yii::createObject([
                    'class'=>'app\components\hotels\queries\booking\Room',
                    'rateKey'=>$this->rateKey
                ]))
                ->addContactData(\Yii::createObject([
                    'class'=>'app\components\hotels\queries\booking\ContactData',
                    'email'=>$this->email,
                    'phoneNumber'=>$this->phoneNumber
                ]))
                ->addClientReference('apiTest')
                ->post()
                ->response();

           return $response;
        } else
            return false;
    }
}