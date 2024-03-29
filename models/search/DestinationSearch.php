<?php

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

        if (mb_strtoupper($params, 'utf-8') == $params) {
            $query->andFilterWhere(['like', '{{%destinations}}.code', $params]);
        }
        else {
            $query->orFilterWhere(['like', '{{%destinations}}.code', $params])
                ->orFilterWhere(['like', '{{%destinations}}.name_en', $params]);
        }

//        if (mb_strtoupper($params, 'utf-8') == $params) {
//            $query->joinWith(['zones'=>function($q) use($params){
//                $q->orFilterWhere(['like', '{{%zones}}.destination_code', $params])
//                    ->orFilterWhere(['like', '{{%zones}}.name_en', $params]);
//            }]);
//        }

        return $dataProvider;
    }
}