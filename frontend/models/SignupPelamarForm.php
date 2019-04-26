<?php
namespace frontend\models;

use backend\models\Pelamar;
use backend\models\Role;
use Yii;
use backend\models\Akun;
use yii\base\Exception;
use yii\base\Model;

/**
 * Signup form for Mahasiswa
 */
class SignupPelamarForm extends Model
{
    public $email;
    public $password;
    public $nama_lengkap;
    public $alamat;
    public $no_telp;
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required', 'message' => '{attribute} tidak boleh kosong.'],
            ['email', 'email', 'message' => 'Gunakan email yang benar.'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\backend\models\Akun', 'message' => 'Email ini telah digunakan.'],

            ['password', 'required', 'message' => '{attribute} tidak boleh kosong.'],
            ['password', 'string', 'min' => 6],

            [['nama_lengkap', 'alamat','no_telp'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['nama_lengkap', 'alamat'], 'string', 'max' => 100],
            [['no_telp'], 'string', 'max' => 20],

            ['verifyCode', 'captcha'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        // Start transaction
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $user = new Akun();
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->id_role = Role::getUserRoleId('Pelamar');

            if(!$user->save()) {
                throw new Exception('Failed to save User');
            }

            $pelamar = new Pelamar();
            $pelamar->nama_lengkap = $this->nama_lengkap;
            $pelamar->alamat = $this->alamat;
            $pelamar->no_telp = $this->no_telp;
            $pelamar->id_akun = $user->id_akun;

//            $user_status = new UserStatusRelation();
//            $user_status->user_id = $user->user_id;
//            $user_status->user_status_id = UserStatus::getUserStatusId('Pending');

//            $user_role = new AkunRoleRelation();
//            $user_role->id_akun = $user->id_akun;
//            $user_role->id_role = Role::getUserRoleId('Pelamar');

            if(!($pelamar->save())) {
                throw new Exception('Failed to save Pelamar Data');
            }

        } catch (Exception $ex) {
            // Rollback if any save() failed
            $transaction->rollBack();
//            return null;
            die($ex->getMessage());
        }

        // Commit Transaction
        $transaction->commit();

        return $user;
    }

}
