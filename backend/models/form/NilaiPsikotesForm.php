<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;

class NilaiPsikotesForm extends Model
{
    // public $nilai_microteaching;
    public $nilai_psikotes;
    // public $nilai_tes_kesehatan;
    public $isNewRecord = true;
    
    public function rules()
    {
        return [
            [['nilai_psikotes'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            // 'nilai_microteaching' => 'Nilai Microteaching',
            'nilai_psikotes' => 'Nilai Psikotes',
            // 'nilai_tes_kesehatan' => 'Nilai Tes Kesehatan',
        ];
    }

}
