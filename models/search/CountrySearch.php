<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 04.04.17
 * Time: 6:26
 */

namespace app\models\search;


use app\models\Countries;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class CountrySearch extends Countries
{
    public $destination_code;
    public $destination_name_en;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['code', 'name_en', 'destination_code', 'destination_name_en'], 'safe'],
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
        $query = Countries::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);



        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith('destinations');
            return $dataProvider;
        }

        // grid filtering conditions


        $query->joinWith('destinations')->orFilterWhere(['like', 'ycl_countries.code', $params])
            ->orFilterWhere(['like', 'ycl_countries.name_en', $params])
            ->orFilterWhere(['like', 'ycl_destinations.code', $params])
            ->orFilterWhere(['like', 'ycl_destinations.name_en', $params]);
     /*   $query->joinWith(['destinations'=>function($q) use($params){
            $q->andFilterWhere(['like', 'ycl_destinations.code', $params])
                ->andFilterWhere(['like', 'ycl_destinations.name_en', $params]);
        }]);*/






        return $dataProvider;
    }
}

