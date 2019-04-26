<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Psikotes;

/**
 * PsikotesSearch represents the model behind the search form about `backend\models\Psikotes`.
 */
class PsikotesSearch extends Psikotes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_psikotes', 'id_apply_lowongan'], 'integer'],
            [['nilai_psikotes'], 'safe'],
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
        $query = Psikotes::find();

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
            'id_psikotes' => $this->id_psikotes,
            'id_apply_lowongan' => $this->id_apply_lowongan,
        ]);

        $query->andFilterWhere(['like', 'nilai_psikotes', $this->nilai_psikotes]);

        return $dataProvider;
    }
}
