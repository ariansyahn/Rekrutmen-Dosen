<?php
namespace backend\models\form;

use Yii;
use yii\base\Model;

/**
 * Signup form for Alumni
 */
class AdminKoordinatorAddForm extends Model
{
    public $email;
    public $unit;
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

            ['unit', 'required', 'message' => '{attribute} tidak boleh kosong.'],
            ['unit', 'string'],
//            ['unit', 'unique', 'targetClass' => '\backend\models\Akun', 'message' => 'Unit ini telah memiliki akun.'],

            ['password', 'required', 'message' => '{attribute} tidak boleh kosong.'],
            ['password', 'string', 'min' => 6],
        ];
    }
}
