<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trans;

/**
 * TransSearch represents the model behind the search form about `app\models\Trans`.
 */
class TransSearch extends Trans
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['trans', 'aff_if', 'actionid', 'datetime', 'offer_name'], 'safe'],
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
        $query = Trans::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'datetime' => $this->datetime,
        ]);

        $query->andFilterWhere(['like', 'trans', $this->trans])
            ->andFilterWhere(['like', 'aff_if', $this->aff_if])
            ->andFilterWhere(['like', 'actionid', $this->actionid])
            ->andFilterWhere(['like', 'offer_name', $this->offer_name]);

        return $dataProvider;
    }
}
