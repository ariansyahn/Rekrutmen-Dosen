<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ApplyLowongan;
use backend\models\Pelamar;
use backend\models\Reqdosen;
use backend\models\Akun;
/**
 * ApplyLowonganSearch represents the model behind the search form about `backend\models\ApplyLowongan`.
 */
class ApplyLowonganSearch extends ApplyLowongan
{
    public $applyStatus;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_apply_lowongan', 'id_apply_lowongan_status', 'id_reqdosen', 'id_pelamar'], 'integer'],
            [['ktp', 'cv', 'ijazah', 'kartu_keluarga', 'skck', 'transkrip_nilai', 'keterangan_pengalaman_kerja','foto'], 'safe'],
            [['applyStatus'], 'safe'],
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
        $query = ApplyLowongan::find();

        // add conditions that should always apply here
     
        $query->joinWith(['idApplyLowonganStatus', 'idReqdosen']);
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
            'id_apply_lowongan' => $this->id_apply_lowongan,
            'id_apply_lowongan_status' => $this->id_apply_lowongan_status,
            'id_reqdosen' => $this->id_reqdosen,
            'id_pelamar' => $this->id_pelamar,
        ]);

        $query->andFilterWhere(['like', 'ktp', $this->ktp])
        ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'cv', $this->cv])
            ->andFilterWhere(['like', 'ijazah', $this->ijazah])
            ->andFilterWhere(['like', 'kartu_keluarga', $this->kartu_keluarga])
            ->andFilterWhere(['like', 'skck', $this->skck])
            ->andFilterWhere(['like', 'transkrip_nilai', $this->transkrip_nilai])
            ->andFilterWhere(['like', 'keterangan_pengalaman_kerja', $this->keterangan_pengalaman_kerja]);

        $query->andFilterWhere([ApplyLowongan::tableName() . '.id_apply_lowongan_status' => $this->applyStatus]);

        // Filter Loker Based on Role
        // if(Yii::$app->user->identity->isAdminKoordinatorUnit) {
        //     // $query->andFilterWhere(['not in', ApplyLowongan::tableName() . '.id_apply_lowongan', Reqdosen::getMultiFakultasLokerList()]);
        //     $query->andFilterWhere(['in', ApplyLowongan::tableName() . '.id_reqdosen', Reqdosen::getUnitReqdosenList(Yii::$app->user->identity->unit->id_unit)]);
        // } elseif (Yii::$app->user->identity->isAdminHRD) {
        //     $query->andFilterWhere(['in', ApplyLowongan::tableName() . '.lowongan_kerja_id', LowonganKerja::getMultiFakultasLokerList()]);
        // }

        return $dataProvider;
    }
}
