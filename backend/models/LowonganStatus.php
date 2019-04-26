<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_lowongan_status".
 *
 * @property integer $id_lowongan_status
 * @property string $status
 *
 * @property Reqdosen[] $Reqdosen
 */
class LowonganStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_lowongan_status';
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
            'id_lowongan_status' => 'Id Lowongan Status',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReqdosen()
    {
        return $this->hasMany(Reqdosen::className(), ['id_lowongan_status' => 'id_lowongan_status']);
    }

    /**
     * Get List of Lowongan Kerja Status
     */
    public static function getLowonganStatusList()
    {
        $droptions = LowonganStatus::find()->asArray()->all();

        return ArrayHelper::map($droptions, 'id_lowongan_status', 'status');
    }

    /**
     * Get Lowongan Kerja Status Id
     */
    public static function getLowonganKerjaStatusId($name)
    {
        $status = LowonganStatus::find()->where(['status' => $name])->one();

        return $status->id_lowongan_status;
    }
}
