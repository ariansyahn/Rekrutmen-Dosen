<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;

class ReqdosenForm extends Model
{
    public $id_matkul;
    public $deskripsi_pekerjaan;
    public $spesifikasi_dosen;
    public $jumlah_dosen;
    public $isNewRecord = true;
    
    public function rules()
    {
        return [
            [['id_matkul', 'deskripsi_pekerjaan', 'spesifikasi_dosen','jumlah_dosen'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['id_matkul','jumlah_dosen'], 'integer'],
            [['deskripsi_pekerjaan','spesifikasi_dosen'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'deskripsi_pekerjaan' => 'Deskripsi Lowongan Kerja',
            'spesifikasi_dosen' => 'Spesifikasi Dosen',
            'id_matkul' => 'Mata Kuliah',
            'jumlah_dosen' => 'Jumlah Dosen'
        ];
    }

}
