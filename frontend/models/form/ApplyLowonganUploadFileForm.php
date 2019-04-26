<?php

namespace frontend\models\form;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ApplyLowonganUploadFileForm extends Model
{
    public $ktp;
    public $foto;
    public $cv;
    public $ijazah;
    public $kartu_keluarga;
    public $skck;
    public $transkrip_nilai;
    public $keterangan_pengalaman_kerja;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ktp','cv','ijazah','kartu_keluarga','skck','transkrip_nilai','keterangan_pengalaman_kerja','foto'], 'required', 'message' => 'Berkas harus disertakan!'],
            [['ktp','cv','ijazah','kartu_keluarga','skck','transkrip_nilai','keterangan_pengalaman_kerja'], 'file', 'extensions'=>'pdf', 'maxSize'=>1024*1024*2, 'wrongExtension' => 'Format file yang diperbolehkan: pdf', 'tooBig' => 'Ukuran file maksimum 2MB'],
            [['foto'], 'file', 'extensions'=>'jpg,png', 'maxSize'=>1024*1024*2, 'wrongExtension' => 'Format file yang diperbolehkan: jpg / png', 'tooBig' => 'Ukuran foto maksimum 2MB'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'foto' => 'Upload Foto (3x4) anda disini (.jpg / .png)',
            'ktp' => 'Upload KTP anda disini (.pdf)',
            'cv' => 'Upload CV anda disini (.pdf)',
            'ijazah' => 'Upload Ijazah anda disini (.pdf)',
            'kartu_keluarga' => 'Upload Kartu Keluarga anda disini (.pdf)',
            'skck' => 'Upload SKCK anda disini (.pdf)',
            'transkrip_nilai' => 'Upload Transkrip Nilai anda disini (.pdf)',
            'keterangan_pengalaman_kerja' => 'Upload Keterangan Pengalaman Kerja anda disini (.pdf)',
        ];
    }

}
