<?php
namespace app\modules\main\components\widgets;

use \frontend\modules\user\models\LoginForm;
use yii\data\ArrayDataProvider;
use yii\widgets\ActiveForm;
use yii\web\Response;
use common\models\UserTypes;
use common\models\ProfileTypes;
use Yii;
use common\behaviors\ProfileRouterBehavior;



/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 01.04.16
 * Time: 22:37
 */


class SearchView extends \yii\base\Widget
{
    public $preview;
    public $viewType;
    public $sortBy;
    public $sortTo;
    public $sort;
    public $pageSize;
    private $dataProvider;


    public function init()
    {
        parent::init();
        $this->sortBy = 'name';

        $this->dataProvider = new ArrayDataProvider([
            'allModels' => $this->preview,
            'sort' => $this->sort,
            'pagination' => [
                'pageSize' => $this->pageSize,
            ],

        ]);

    }

    public function run()
    {
        return $this->render('search-view', [
            'dataProvider' => $this->dataProvider,
            'viewType' => $this->viewType
        ]);
    }
}