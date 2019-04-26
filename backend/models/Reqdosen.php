<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Expression;

/**
 * This is the model class for table "t_reqdosen".
 *
 * @property integer $id_request
 * @property integer $id_matkul
 * @property integer $id_lowongan_status
 * @property integer $jumlah_dosen
 * @property string $deskripsi_pekerjaan
 * @property string $spesifikasi_dosen
 *
 * @property TApplyLowongan[] $tApplyLowongans
 * @property TLowonganStatus $idLowonganStatus
 * @property TMatkul $idMatkul
 * @property TUnitReqdosenRelation[] $tUnitReqdosenRelations
 */
class Reqdosen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_reqdosen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matkul', 'id_lowongan_status', 'jumlah_dosen', 'deskripsi_pekerjaan', 'spesifikasi_dosen'], 'required'],
            [['id_matkul', 'id_lowongan_status', 'jumlah_dosen'], 'integer'],
            [['deskripsi_pekerjaan', 'spesifikasi_dosen'], 'string'],
            [['id_lowongan_status'], 'exist', 'skipOnError' => true, 'targetClass' => LowonganStatus::className(), 'targetAttribute' => ['id_lowongan_status' => 'id_lowongan_status']],
            [['id_matkul'], 'exist', 'skipOnError' => true, 'targetClass' => Matkul::className(), 'targetAttribute' => ['id_matkul' => 'id_matkul']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_request' => 'Id Request',
            'id_matkul' => 'Mata Kuliah',
            'id_lowongan_status' => 'Status Lowongan',
            'jumlah_dosen' => 'Jumlah Dosen',
            'deskripsi_pekerjaan' => 'Deskripsi Pekerjaan',
            'spesifikasi_dosen' => 'Spesifikasi Dosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplyLowongans()
    {
        return $this->hasMany(ApplyLowongan::className(), ['id_reqdosen' => 'id_request']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLowonganStatus()
    {
        return $this->hasOne(LowonganStatus::className(), ['id_lowongan_status' => 'id_lowongan_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMatkul()
    {
        return $this->hasOne(Matkul::className(), ['id_matkul' => 'id_matkul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitReqdosenRelations()
    {
        return $this->hasMany(UnitReqdosenRelation::className(), ['id_reqdosen' => 'id_request']);
    }

    // public static function getUnitReqdosenList($id_unit)
    // {
    //     $units = Reqdosen::find()
    //         ->join('INNER JOIN', UnitReqdosenRelation::tableName(), Reqdosen::tableName() . '.id_request = ' . UnitReqdosenRelation::tableName() . '.id_reqdosen')
    //         ->where([UnitReqdosenRelation::tableName() . '.id_unit' => $id_unit])
    //         ->groupBy(Reqdosen::tableName() . '.id_request')
    //         ->asArray()
    //         ->all();

    //     $units = ArrayHelper::getColumn($units, 'id_request');

    //     return $units; 
    // }

    // public static function getMultiKoordinatorReqdosenList()
    // {
    //     $lokers = Reqdosen::find()
    //         ->join('INNER JOIN', UnitReqdosenRelation::tableName(), Reqdosen::tableName() . '.id_request = ' . UnitReqdosenRelation::tableName() . '.lowongan_kerja_id')
    //         ->join('INNER JOIN', Unit::tableName(), UnitReqdosenRelation::tableName() . '.id_unit = ' . Unit::tableName() . '.id_unit')
    //         ->groupBy(Unit::tableName() . '.id_request')
    //         ->having(['>', 'COUNT(DISTINCT ' . Unit::tableName() . '.id_unit)', 1])
    //         ->asArray()
    //         ->all();

    //     $lokers = ArrayHelper::getColumn($lokers, 'lowongan_kerja_id');

    //     return $lokers;
    // }

    public static function getUnitReqdosenList($id_unit)
    {
        $units = Reqdosen::find()
            ->join('INNER JOIN', UnitReqdosenRelation::tableName(), Reqdosen::tableName() . '.id_request = ' . UnitReqdosenRelation::tableName() . '.id_reqdosen')
            ->join('INNER JOIN', Unit::tableName(), UnitReqdosenRelation::tableName() . '.id_unit = ' . Unit::tableName() . '.id_unit')
            ->where([Unit::tableName() . '.id_unit' => $id_unit])
            ->groupBy(Reqdosen::tableName() . '.id_request')
            ->asArray()
            ->all();

        $units = ArrayHelper::getColumn($units, 'id_request');

        return $units;
    }

    /**
     * @return ApplyLowongan
     */
    public function getUserApplyData()
    {
        $id_akun = Pelamar::find()->where(['id_akun' => \Yii::$app->user->identity->id_akun])->one();
        $loker = ApplyLowongan::find()
            ->where(['id_reqdosen' => $this->id_request])
            ->andWhere(['id_pelamar' => $id_akun])
            ->one();

        return $loker;
    }
}
