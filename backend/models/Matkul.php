<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "t_matkul".
 *
 * @property integer $id_matkul
 * @property string $kode_matkul
 * @property string $nama_matkul
 *
 * @property Reqdosen[] $Reqdosen
 */
class Matkul extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_matkul';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_matkul','kode_matkul'], 'required'],
            [['kode_matkul'], 'string', 'max' => 20],
            [['nama_matkul'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matkul' => 'Id Mata Kuliah',
            'kode_matkul' => 'Kode Mata Kuliah',
            'nama_matkul' => 'Mata Kuliah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReqdosen()
    {
        return $this->hasMany(Reqdosen::className(), ['id_matkul' => 'id_matkul']);
    }

    /**
     * Get List of Prodi
     */
    public static function getMatkulList()
    {
        $droptions = Matkul::find()->asArray()->all();

        return ArrayHelper::map($droptions, 'id_matkul','nama_matkul','kode_matkul');
    }

    /**
     * Get Prodi Id
     */
    public static function getMatkulId($name)
    {
        $matkul = Matkul::find()->where(['nama_matkul' => $name])->one();

        return $matkul->id_matkul;
    }
}
