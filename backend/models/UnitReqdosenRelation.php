<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "t_unit_reqdosen_relation".
 *
 * @property integer $id_unit_reqdosen_relation
 * @property integer $id_unit
 * @property integer $id_reqdosen
 *
 * @property TUnit $idUnit
 * @property TReqdosen $idReqdosen
 */
class UnitReqdosenRelation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_unit_reqdosen_relation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unit', 'id_reqdosen'], 'required'],
            [['id_unit', 'id_reqdosen'], 'integer'],
            [['id_unit'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['id_unit' => 'id_unit']],
            [['id_reqdosen'], 'exist', 'skipOnError' => true, 'targetClass' => Reqdosen::className(), 'targetAttribute' => ['id_reqdosen' => 'id_request']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_unit_reqdosen_relation' => 'Id Unit Reqdosen Relation',
            'id_unit' => 'Id Unit',
            'id_reqdosen' => 'Id Reqdosen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUnit()
    {
        return $this->hasOne(Unit::className(), ['id_unit' => 'id_unit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdReqdosen()
    {
        return $this->hasOne(Reqdosen::className(), ['id_request' => 'id_reqdosen']);
    }

    public function getNamaUnit($id){
        $unit = Unit::find()->where(['id_unit' => $id])->one();
        return $unit->nama_unit;
    }
}
