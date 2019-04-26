<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "t_role".
 *
 * @property integer $id_role
 * @property string $nama_role
 *
 * @property Akun[] $Akun
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_role'], 'required'],
            [['nama_role'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_role' => 'Id Role',
            'nama_role' => 'Nama Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkun()
    {
        return $this->hasMany(Akun::className(), ['id_role' => 'id_role']);
    }

    public static function getUserRoleList()
    {
        $droptions = Role::find()->asArray()->all();

        return ArrayHelper::map($droptions, 'id_role', 'nama_role');
    }

    /**
     * Get List of User Admin Roles
     */
    public static function getUserAdminRoleList()
    {
        $droptions = Role::find()->where(['like', 'nama_role', 'Admin'])->asArray()->all();
        return ArrayHelper::map($droptions, 'id_role', 'nama_role');
    }

    /**
     * Get User Role Id
     */
    public static function getUserRoleId($name)
    {
        $role = Role::find()->where(['nama_role' => $name])->one();

        return $role->id_role;
    }
}
