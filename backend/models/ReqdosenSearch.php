<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Reqdosen;

/**
 * ReqdosenSearch represents the model behind the search form about `backend\models\Reqdosen`.
 */
class ReqdosenSearch extends Reqdosen
{
    public $unit;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_request', 'id_matkul', 'id_lowongan_status', 'jumlah_dosen'], 'integer'],
            [['deskripsi_pekerjaan', 'spesifikasi_dosen','unit'], 'safe'],
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
        $query = Reqdosen::find();

        // add conditions that should always apply here
        $query->joinWith(['unitReqdosenRelations']);

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
            'id_request' => $this->id_request,
            'id_matkul' => $this->id_matkul,
            'id_lowongan_status' => $this->id_lowongan_status,
            'jumlah_dosen' => $this->jumlah_dosen,
        ]);

        $query->andFilterWhere(['like', 'deskripsi_pekerjaan', $this->deskripsi_pekerjaan])
            ->andFilterWhere(['like', 'spesifikasi_dosen', $this->spesifikasi_dosen]);

             // Filter Loker Based on Role
        // if(Yii::$app->user->identity->isAdminKoordinatorUnit) {
            // $query->andFilterWhere(['not in', LowonganKerja::tableName() . '.lowongan_kerja_id', LowonganKerja::getMultiFakultasLokerList()]);
            // $query->andFilterWhere(['in', Reqdosen::tableName() . '.id_request', Reqdosen::getUnitReqdosenList(Yii::$app->user->identity->unit->id_unit)]);
        // } 
        // elseif (Yii::$app->user->identity->isAdminPPKHA) {
            // $query->andFilterWhere(['in', LowonganKerja::tableName() . '.lowongan_kerja_id', LowonganKerja::getMultiFakultasLokerList()]);
        // }

        // $query->andFilterWhere([
        //     'lowongan_kerja_tipe_id' => $this->tipe_loker,
        // ]);

        return $dataProvider;
    }

    public function searchUnit($params)
    {
        $query = Reqdosen::find();

        // add conditions that should always apply here
        // $query->joinWith(['unitReqdosenRelations']);

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
            'id_request' => $this->id_request,
            'id_matkul' => $this->id_matkul,
            'id_lowongan_status' => $this->id_lowongan_status,
            'jumlah_dosen' => $this->jumlah_dosen,
        ]);

        $query->andFilterWhere(['like', 'deskripsi_pekerjaan', $this->deskripsi_pekerjaan])
            ->andFilterWhere(['like', 'spesifikasi_dosen', $this->spesifikasi_dosen]);

            $query->select([
                't_reqdosen.id_request',
                't_reqdosen.id_matkul',
                't_reqdosen.id_lowongan_status',
                't_reqdosen.jumlah_dosen',
                't_reqdosen.desk`ripsi_pekerjaan',
                't_reqdosen.spesifikasi_dosen',])
            ->from('t_reqdosen')
            ->join('INNER JOIN', ''
                    , 'spkp_t_permohonan_cuti.id_pcuti = spkp_t_status_permohonancuti.id_pcuti')
            ->where('spkp_t_status_permohonancuti.status like "Confirm Atasan Langsung"');

             // Filter Loker Based on Role
        // if(Yii::$app->user->identity->isAdminKoordinatorUnit) {
            // $query->andFilterWhere(['not in', LowonganKerja::tableName() . '.lowongan_kerja_id', LowonganKerja::getMultiFakultasLokerList()]);
            // $query->andFilterWhere(['in', Reqdosen::tableName() . '.id_request', Reqdosen::getUnitReqdosenList(Yii::$app->user->identity->unit->id_unit)]);
        // } 
        // elseif (Yii::$app->user->identity->isAdminPPKHA) {
            // $query->andFilterWhere(['in', LowonganKerja::tableName() . '.lowongan_kerja_id', LowonganKerja::getMultiFakultasLokerList()]);
        // }

        // $query->andFilterWhere([
        //     'lowongan_kerja_tipe_id' => $this->tipe_loker,
        // ]);

        return $dataProvider;
    }

    public function searchOpen($params)
    {
        $query = Reqdosen::find()->where(['id_lowongan_status' => 1]);

        // add conditions that should always apply here
        $query->joinWith(['unitReqdosenRelations']);

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
            'id_request' => $this->id_request,
            'id_matkul' => $this->id_matkul,
            'id_lowongan_status' => $this->id_lowongan_status,
            'jumlah_dosen' => $this->jumlah_dosen,
        ]);

        $query->andFilterWhere(['like', 'deskripsi_pekerjaan', $this->deskripsi_pekerjaan])
            ->andFilterWhere(['like', 'spesifikasi_dosen', $this->spesifikasi_dosen]);

             // Filter Loker Based on Role
        // if(Yii::$app->user->identity->isAdminKoordinatorUnit) {
            // $query->andFilterWhere(['not in', LowonganKerja::tableName() . '.lowongan_kerja_id', LowonganKerja::getMultiFakultasLokerList()]);
            // $query->andFilterWhere(['in', Reqdosen::tableName() . '.id_request', Reqdosen::getUnitReqdosenList(Yii::$app->user->identity->unit->id_unit)]);
        // } 
        // elseif (Yii::$app->user->identity->isAdminPPKHA) {
            // $query->andFilterWhere(['in', LowonganKerja::tableName() . '.lowongan_kerja_id', LowonganKerja::getMultiFakultasLokerList()]);
        // }

        // $query->andFilterWhere([
        //     'lowongan_kerja_tipe_id' => $this->tipe_loker,
        // ]);

        return $dataProvider;
    }

}
