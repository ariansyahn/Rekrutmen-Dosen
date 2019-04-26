<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_microteaching".
 *
 * @property integer $id_microteaching
 * @property string $nilai_microteaching
 * @property integer $id_apply_lowongan
 *
 * @property TApplyLowongan $idApplyLowongan
 */
class Microteaching extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_microteaching';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nilai_microteaching', 'id_apply_lowongan'], 'required'],
            [['id_apply_lowongan'], 'integer'],
            [['nilai_microteaching'], 'string', 'max' => 10],
            [['id_apply_lowongan'], 'exist', 'skipOnError' => true, 'targetClass' => ApplyLowongan::className(), 'targetAttribute' => ['id_apply_lowongan' => 'id_apply_lowongan']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_microteaching' => 'Id Microteaching',
            'nilai_microteaching' => 'Nilai Microteaching',
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
