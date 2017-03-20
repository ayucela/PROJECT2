<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 20.03.17
 * Time: 5:50
 */

namespace app\components\hotels\hotel;


use app\components\hotels\helpers\RoomImageHelper;
use yii\base\Component;

class Room extends Component
{
    public $date_from;
    public $date_to;
    public $name;
    public $adults;
    public $children;
    public $hotelCode;
    public $roomCode;
    public $rateCode;
    public $description;
    public $price;
    public $currency;
    public $allotment;
    public $rateCommentId;

    public $facilitiesIds = [];

    private $nights;
    private $rateComment;
    private $facilities = [];
    private $images = [];

    public function getImages()
    {
        $this->images = RoomImageHelper::findImages($this->roomCode, $this->hotelCode);
        return $this->images;
    }

    public function getFacilities()
    {

    }

}