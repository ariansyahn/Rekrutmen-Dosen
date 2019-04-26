<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_apply_lowongan_status".
 *
 * @property integer $id_apply_lowongan_status
 * @property string $status
 *
 * @property ApplyLowongan[] $tApplyLowongans
 */
class ApplyLowonganStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_apply_lowongan_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_apply_lowongan_status' => 'Id Apply Lowongan Status',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplyLowongan()
    {
        return $this->hasMany(ApplyLowongan::className(), ['id_apply_lowongan_status' => 'id_apply_lowongan_status']);
    }
       /**
     * Get List of Apply Lowongan Status
     */
    public static function getApplyLowonganStatusList()
    {
        $droptions = ApplyLowonganStatus::find()->asArray()->all();

        return ArrayHelper::map($droptions, 'id_apply_lowongan_status', 'status');
    }

    /**
     * Get Apply Lowongan Status Id
     */
    public static function getApplyLowonganStatusId($name)
    {
        $status = ApplyLowonganStatus::find()->where(['status' => $name])->one();

        return $status->id_apply_lowongan_status;
    }
}
