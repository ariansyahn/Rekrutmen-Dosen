<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_psikotes".
 *
 * @property integer $id_psikotes
 * @property string $nilai_psikotes
 * @property integer $id_apply_lowongan
 *
 * @property TApplyLowongan $idApplyLowongan
 */
class Psikotes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_psikotes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nilai_psikotes', 'id_apply_lowongan'], 'required'],
            [['id_apply_lowongan'], 'integer'],
            [['nilai_psikotes'], 'string', 'max' => 10],
            [['id_apply_lowongan'], 'exist', 'skipOnError' => true, 'targetClass' => ApplyLowongan::className(), 'targetAttribute' => ['id_apply_lowongan' => 'id_apply_lowongan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_psikotes' => 'Id Psikotes',
            'nilai_psikotes' => 'Nilai Psikotes',
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
