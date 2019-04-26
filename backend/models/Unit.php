<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "t_unit".
 *
 * @property integer            $id_unit
 * @property string             $nama_unit
 * @property Akun $Akun
 * @property UnitReqdosenRelation[] $UnitReqdosenRelation
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_unit', 'id_akun'], 'required'],
            [['id_akun'], 'integer'],
            [['nama_unit'], 'string', 'max' => 45],
            [['id_akun'], 'exist', 'skipOnError' => true, 'targetClass' => Akun::className(), 'targetAttribute' => ['id_akun' => 'id_akun']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_unit' => 'Id Unit',
            'nama_unit' => 'Nama Unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkun()
    {
        return $this->hasOne(Akun::className(), ['id_akun' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitReqdosenRelation()
    {
        return $this->hasMany(UnitReqdosenRelation::className(), ['id_unit' => 'id_unit']);
    }
    /**
     * Get List of Prodi
     */
    public static function getUnitList()
    {
        $droptions = Unit::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'id_unit', 'nama_unit');
    }

    /**
     * Get Prodi Id
     */
    public static function getUnitId($name)
    {
        $unit = Unit::find()->where(['nama_unit' => $name])->one();
        return $unit->id_unit;
    }

}
