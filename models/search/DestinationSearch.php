<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.04.17
 * Time: 9:17
 */

namespace app\models\search;


use app\models\Destinations;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DestinationSearch extends Destinations
{

    public function rules()
    {


        return [
            [['id'], 'integer'],
            [['code', 'name_en'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Destinations::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions


        $query->orFilterWhere(['like', 'code', $params])
            ->orFilterWhere(['like', 'name_en', $params]);

        /*   $query->joinWith(['destinations'=>function($q) use($params){
               $q->andFilterWhere(['like', 'ycl_destinations.code', $params])
                   ->andFilterWhere(['like', 'ycl_destinations.name_en', $params]);
           }]);*/






        return $dataProvider;
    }
}