<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_tanggal_tes".
 *
 * @property integer $id_tanggal_tes
 * @property string $tanggal_microteaching
 * @property string $tanggal_psikotes
 * @property string $tanggal_kesehatan
 * @property integer $id_apply_lowongan
 *
 * @property TApplyLowongan $idApplyLowongan
 */
class TanggalTes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_tanggal_tes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_microteaching', 'tanggal_psikotes', 'tanggal_kesehatan', 'id_apply_lowongan'], 'required'],
            [['tanggal_microteaching', 'tanggal_psikotes', 'tanggal_kesehatan'], 'safe'],
            [['id_apply_lowongan'], 'integer'],
            [['id_apply_lowongan'], 'exist', 'skipOnError' => true, 'targetClass' => ApplyLowongan::className(), 'targetAttribute' => ['id_apply_lowongan' => 'id_apply_lowongan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tanggal_tes' => 'Id Tanggal Tes',
            'tanggal_microteaching' => 'Tanggal Microteaching',
            'tanggal_psikotes' => 'Tanggal Psikotes',
            'tanggal_kesehatan' => 'Tanggal Kesehatan',
            'id_apply_lowongan' => 'Id Apply Lowongan',
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
