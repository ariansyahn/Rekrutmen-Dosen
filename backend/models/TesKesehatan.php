<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_tes_kesehatan".
 *
 * @property integer $id_tes_kesehatan
 * @property string $nilai_tes_kesehatan
 * @property string $keterangan
 * @property integer $id_apply_lowongan
 *
 * @property TApplyLowongan $idApplyLowongan
 */
class TesKesehatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_tes_kesehatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nilai_tes_kesehatan', 'id_apply_lowongan','keterangan'], 'required'],
            [['id_apply_lowongan'], 'integer'],
            [['nilai_tes_kesehatan'], 'string', 'max' => 10],
            [['keterangan'], 'string', 'max' => 255],
            [['id_apply_lowongan'], 'exist', 'skipOnError' => true, 'targetClass' => ApplyLowongan::className(), 'targetAttribute' => ['id_apply_lowongan' => 'id_apply_lowongan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tes_kesehatan' => 'Id Tes Kesehatan',
            'nilai_tes_kesehatan' => 'Nilai Tes Kesehatan',
            'id_apply_lowongan' => 'Id Apply Lowongan',
            'keterangan' => 'Keterangan Tes Kesehatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdApplyLowongan()
    {
        return $this->hasOne(ApplyLowongan::className(), ['id_apply_lowongan' => 'id_apply_lowongan']);
    }
}
