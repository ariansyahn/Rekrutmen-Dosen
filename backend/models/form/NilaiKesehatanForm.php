<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;

class NilaiKesehatanForm extends Model
{
    // public $nilai_microteaching;
    // public $nilai_psikotes;
    public $nilai_tes_kesehatan;
    public $keterangan;
    public $isNewRecord = true;
    
    public function rules()
    {
        return [
            [['nilai_tes_kesehatan','keterangan'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            // 'nilai_microteaching' => 'Nilai Microteaching',
            // 'nilai_psikotes' => 'Nilai Psikotes',
            'nilai_tes_kesehatan' => 'Nilai Tes Kesehatan',
            'keterangan' => 'Keterangan Tes Kesehatan',
        ];
    }

}
