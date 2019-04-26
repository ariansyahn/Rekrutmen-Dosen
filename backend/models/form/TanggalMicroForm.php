<?php

namespace backend\models\form;

use Yii;
use yii\base\Model;

class TanggalMicroForm extends Model
{
    public $tanggal_microteaching;
    // public $tanggal_psikotes;
    // public $tanggal_kesehatan;
    public $isNewRecord = true;
    
    public function rules()
    {
        return [
            [['tanggal_microteaching'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'tanggal_microteaching' => 'Tanggal Microteaching',
            // 'tanggal_psikotes' => 'Tanggal Psikotes',
            // 'tanggal_kesehatan' => 'Tanggal Tes Kesehatan',
        ];
    }

}
