<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_apply_lowongan".
 *
 * @property integer $id_apply_lowongan
 * @property integer $id_apply_lowongan_status
 * @property integer $id_reqdosen
 * @property integer $id_pelamar
 * @property string $ktp
 * @property string $foto
 * @property string $cv
 * @property string $ijazah
 * @property string $kartu_keluarga
 * @property string $skck
 * @property string $transkrip_nilai
 * @property string $keterangan_pengalaman_kerja
 *
 * @property TPelamar $idPelamar
 * @property TReqdosen $idReqdosen
 * @property TApplyLowonganStatus $idApplyLowonganStatus
 */
class ApplyLowongan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_apply_lowongan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_apply_lowongan_status', 'id_reqdosen', 'id_pelamar', 'ktp', 'cv', 'ijazah', 'kartu_keluarga', 'skck', 'transkrip_nilai', 'keterangan_pengalaman_kerja','foto'], 'required'],
            [['id_apply_lowongan_status', 'id_reqdosen', 'id_pelamar'], 'integer'],
            [['ktp', 'cv', 'ijazah', 'kartu_keluarga', 'skck', 'transkrip_nilai', 'keterangan_pengalaman_kerja','foto'], 'string', 'max' => 100],
            [['id_pelamar'], 'exist', 'skipOnError' => true, 'targetClass' => Pelamar::className(), 'targetAttribute' => ['id_pelamar' => 'id_pelamar']],
            [['id_reqdosen'], 'exist', 'skipOnError' => true, 'targetClass' => Reqdosen::className(), 'targetAttribute' => ['id_reqdosen' => 'id_request']],
            [['id_apply_lowongan_status'], 'exist', 'skipOnError' => true, 'targetClass' => ApplyLowonganStatus::className(), 'targetAttribute' => ['id_apply_lowongan_status' => 'id_apply_lowongan_status']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_apply_lowongan' => 'Id Apply Lowongan',
            'id_apply_lowongan_status' => 'Id Apply Lowongan Status',
            'id_reqdosen' => 'Id Reqdosen',
            'id_pelamar' => 'Pelamar',
            'foto' => 'Foto 3x4',
            'ktp' => 'Ktp',
            'cv' => 'Cv',
            'ijazah' => 'Ijazah',
            'kartu_keluarga' => 'Kartu Keluarga',
            'skck' => 'Skck',
            'transkrip_nilai' => 'Transkrip Nilai',
            'keterangan_pengalaman_kerja' => 'Keterangan Pengalaman Kerja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPelamar()
    {
        return $this->hasOne(Pelamar::className(), ['id_pelamar' => 'id_pelamar']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdReqdosen()
    {
        return $this->hasOne(Reqdosen::className(), ['id_request' => 'id_reqdosen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdApplyLowonganStatus()
    {
        return $this->hasOne(ApplyLowonganStatus::className(), ['id_apply_lowongan_status' => 'id_apply_lowongan_status']);
    }

    
}
