<?php
namespace backend\models\form;

use Yii;
use yii\base\Model;

/**
 * Signup form for Alumni
 */
class AdminHrdAddForm extends Model
{
    public $email;
    public $password;

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
        ];
    }
}
