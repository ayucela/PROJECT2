<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 08.03.17
 * Time: 19:33
 */

namespace app\modules\main\models;


use app\components\hotels\ApiClient;
use app\components\hotels\helpers\HotelsPreviewHelper;
use app\components\hotels\queries\availability\Destination;
use app\components\hotels\queries\availability\Occupancies;
use app\components\hotels\queries\availability\Review;
use app\components\hotels\queries\availability\Stay;
use app\components\hotels\queries\AvailabilityApiQuery;
use app\modules\main\components\filter\FilterFactory;
use Yii;
use yii\base\Model;
use yii\helpers\Url;
use yii\web\HttpException;

class PreviewForm extends Model
{
    const SORT_BY_NAME = 1;
    const SORT_BY_PRICE = 2;
    const SORT_BY_RATING = 3;
    const SORT_BY_POPULARITY = 4;

    public $destination;
    public $destinationCode;
    public $destinationZone;
    public $hotel;
    public $rooms;
    public $adults;
    public $children;
    //public $paxes;
    public $date_from;
    public $date_to;
    public $price_from;
    public $price_to;
    public $accommodation;
    public $amenities;
    public $language;
    private $minmax;


    private $hotels;
    private $preview;
    private $filterPrice;
    private $filterAccomodation;
    private $filterAmenities;
    private $mainAttributes;
    private $oldMainAttributes;



    public function rules()
    {
        return [
            [['destination', 'language'], 'string'],
            [['destinationZone', 'hotelCode','rooms', 'adults', 'children', 'price_from',
              'price_to'], 'integer'],
            [['destination', 'date_from', 'date_to', 'rooms', 'adults', 'children'], 'required'],
            [['date_from', 'date_to'], 'date'],
            [['accommodation', 'amenities'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'destination' => \Yii::t('app', 'Destination'),
            'destinationCode' => \Yii::t('app', 'Code'),
            'destinationZone' => \Yii::t('app', 'Zone'),
            'hotelCode'=> \Yii::t('app', 'Hotel Code'),
            'rooms' => \Yii::t('app', 'Rooms'),
            'adults'=> \Yii::t('app', 'Adults'),
            'children' => \Yii::t('app', 'Children'),
            'checkIn' => \Yii::t('app', 'Check In'),
            'checkOut' => \Yii::t('app', 'Check Out'),
            'price_from' => \Yii::t('app', 'Price From'),
            'price_to' => \Yii::t('app', 'Price To'),
            'userRating' => \Yii::t('app', 'User Rating'),
            'accommodation' => \Yii::t('app', 'Accommodations'),
            'amenities'=>\Yii::t('app', 'Amenity'),
            'language'=>\Yii::t('app', 'Language')
        ];
    }



    public function prepare()
    {

        $this->mainAttributes = [
                'destination' => $this->destination,
                'date_from' => $this->date_from,
                'date_to' => $this->date_to,
                'rooms' => $this->rooms,
                'adults' => $this->adults,
                'children' => $this->children,
        ];

        $this->setPreview();

        $this->setMinMax();

        $this->filter();

      //  dd($this->preview);

        if(!$this->price_from || !$this->price_to){
            $this->setPrice();
        }

        \Yii::$app->cache->set('attr', $this->mainAttributes);

        if(isset($this->preview) && is_array($this->preview)){
          return true;
        } else
            throw new HttpException(503, 'Preview not set!');
    }

    public function getPreview()
    {
        return $this->preview;
    }

    public function getMinMax()
    {
        return $this->minmax;
    }

    public function getMainAttributes()
    {
        return $this->mainAttributes;
    }

    private function setPreview()
    {

        if($this->isChanged()) {

            $this->preview = HotelsPreviewHelper::findHotels($this->availability());
            \Yii::$app->cache->set('preview', $this->preview);
        } else

            if(\Yii::$app->cache->get('preview')){

                $this->preview = \Yii::$app->cache->get('preview');

            } else {
               $this->preview = HotelsPreviewHelper::findHotels($this->availability());
                \Yii::$app->cache->set('preview', $this->preview);
            };

    }

    private function availability()
    {
      //dd($this);
        $dateFrom = \DateTime::createFromFormat("m/d/Y", $this->date_from);
        $dateTo = \DateTime::createFromFormat("m/d/Y", $this->date_to);

        if (is_bool($dateFrom) || is_bool($dateTo)) {
            return ApiClient::query(AvailabilityApiQuery::className())
                ->addDestination(new Destination([
                    'code' => $this->destination
                ]))
                ->addOccupancies(new Occupancies([
                    'rooms' => $this->rooms,
                    'adults' => $this->adults,
                    'children' => $this->children
                ]))
                ->post()
                ->response();
        }
        else {
            return ApiClient::query(AvailabilityApiQuery::className())
                ->addDestination(new Destination([
                    'code' => $this->destination
                ]))
                ->addStay(new Stay([
                    'checkIn' => $dateFrom->format('Y-m-d'),
                    'checkOut' => $dateTo->format('Y-m-d'),
                ]))
                ->addOccupancies(new Occupancies([
                    'rooms' => $this->rooms,
                    'adults' => $this->adults,
                    'children' => $this->children
                ]))
                ->post()
                ->response();
        }
    }

    private function setMinMax()
    {
        if($this->preview && is_array($this->preview)) {

            foreach ($this->preview as $item) {
                $prices[] = explode(' ', $item['price'])[0];
            }


            $this->minmax =  [
                'min' => round(min($prices) * 0.99),
                'max' => round(max($prices) * 1.01)
            ];
        } return false;
    }

    private function setFilterPrice()
    {
        if($this->price_from && $this->price_to){
            $this->filterPrice = [
                'price' => [
                    'minPrice' => $this->price_from,
                    'maxPrice' => $this->price_to,
                ]
            ];
            return true;
        } else
            return false;
    }

    private function setFilterAccommodations()
    {

        if($this->accommodation){
            $accommodation = explode(',',$this->accommodation);
            $this->filterAccomodation = [
                'accs' => $accommodation
            ];

            return true;
        } else
            return false;
    }

    private function setFilterAmenities()
    {

        if($this->amenities){
            $amenities = explode(',',$this->amenities);
            $this->filterAmenities = [
                'facility' => $amenities
            ];

            return true;
        } else
            return false;
    }

    private function setPrice()
    {
        $this->price_from = $this->minmax['min'];
        $this->price_to = $this->minmax['max'];
    }

    private function filter()
    {

        if ($this->setFilterPrice()) {

            $this->preview = FilterFactory::create($this->preview, $this->filterPrice);
        }

        if ($this->setFilterAccommodations()) {
            $this->preview = FilterFactory::create($this->preview, $this->filterAccomodation);
        }

        if ($this->setFilterAmenities()) {

            $this->preview = FilterFactory::create($this->preview, $this->filterAmenities);
        }

    }

    private function isChanged()
    {
        $oldAttributes = \Yii::$app->cache->get('attr');

        if(isset($oldAttributes) && is_array($oldAttributes)) {
            $result = array_diff($this->mainAttributes, $oldAttributes);

            if (empty($result)) {
                return false;
            } else
                return true;
        } else
            return true;
    }





}