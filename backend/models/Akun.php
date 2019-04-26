<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "t_akun".
 *
 * @property integer $id_akun
 * @property string $email
 * @property string $password
 * @property string $created_at
 * @property integer $id_role
 *
 * @property Role $role
 * @property Pelamar[] $pelamar
 * @property Unit[] $unit
 */
class Akun extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 't_akun';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['created_at'], 'safe'],
            [['id_role'], 'integer'],
            [['email', 'password'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_role' => 'id_role']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_akun' => 'Id Akun',
            'email' => 'Email',
            'password' => 'Password',
            'created_at' => 'Created At',
            'id_role' => 'Id Role',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id_akun' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id_role' => 'id_role']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelamar()
    {
        return $this->hasMany(Pelamar::className(), ['id_akun' => 'id_akun']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasMany(Unit::className(), ['id_akun' => 'id_akun']);
    }

    public function getIsAdmin()
    {
        return ArrayHelper::isIn($this->role->nama_role, Role::getUserAdminRoleList());
    }

    public function getIsAdminKoordinatorUnit()
    {
        return $this->role->id_role == Role::getUserRoleId('Admin Koordinator Unit');
    }

    public function getIsAdminHRD()
    {
        return $this->role->id_role == Role::getUserRoleId('Admin HRD');
    }

    public function getIsSuperAdmin()
    {
        return $this->role->id_role == Role::getUserRoleId('Super Admin');
    }

    public function getIsPelamar()
    {
        return $this->role->id_role == Role::getUserRoleId('Pelamar');
    }
    public function getNamaUnit()
    {
        return $this->Unit->nama_unit;
    }
}
