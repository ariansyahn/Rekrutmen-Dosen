<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Akun;

/**
 * AkunSearch represents the model behind the search form about `backend\models\Akun`.
 */
class AkunSearch extends Akun
{
    public $user_role;
    // public $nama_unit;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_akun', 'id_role'], 'integer'],
            [['email', 'password', 'created_at'], 'safe'],
            [['user_role'],'safe']
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
        $query = Akun::find();

        // add conditions that should always apply here 
        $query->joinWith(['role']);

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
            'id_akun' => $this->id_akun,
            'created_at' => $this->created_at,
            'id_role' => $this->id_role,
        ]);
        // self::tableName() . '.structure_id' => $this->structure_id,
        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password]);
            // ->andFilterWhere(['id_role' => $this->user_role]);
        $query->andFilterWhere([self::tableName() . '.id_role' => $this->user_role]);
        return $dataProvider;
    }
}
