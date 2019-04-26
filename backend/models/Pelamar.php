<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "t_pelamar".
 *
 * @property integer $id_pelamar
 * @property string $nama_lengkap
 * @property string $no_telp
 * @property string $alamat
 * @property integer $id_akun
 *
 * @property Akun $idAkun
 */
class Pelamar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_pelamar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_lengkap', 'no_telp', 'alamat', 'id_akun'], 'required'],
            [['id_akun'], 'integer'],
            [['nama_lengkap', 'alamat'], 'string', 'max' => 100],
            [['no_telp'], 'string', 'max' => 20],
            [['id_akun'], 'exist', 'skipOnError' => true, 'targetClass' => Akun::className(), 'targetAttribute' => ['id_akun' => 'id_akun']],
//            [['id_berkas'], 'exist', 'skipOnError' => true, 'targetClass' => Berkas::className(), 'targetAttribute' => ['id_berkas' => 'id_berkas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pelamar' => 'Id Pelamar',
            'nama_lengkap' => 'Nama Lengkap',
            'no_telp' => 'No Telp',
            'alamat' => 'Alamat',
            'id_akun' => 'Id Akun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkun()
    {
        return $this->hasOne(Akun::className(), ['id_akun' => 'id_akun']);
    }

}
