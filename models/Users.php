<?php

namespace app\models;

date_default_timezone_set("Asia/Jakarta");

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id_user
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property string $phone
 * @property string $gender
 * @property string $birthdate
 * @property string $province
 * @property string $city
 * @property string $district
 * @property string $address
 * @property integer $postalcode
 * @property string $created_at
 * @property string $authKey
 * @property string $accessToken
 */
class Users extends \yii\db\ActiveRecord
{
    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'fullname', 'gender','accessToken'], 'required'],
            [['gender', 'address'], 'string'],
            [['birthdate', 'created_at'], 'safe'],
            [['postalcode'], 'integer'],
            [['email', 'fullname', 'province', 'city', 'district'], 'string', 'max' => 100],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 500],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'email' => 'Email',
            'password' => 'Password',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
            'gender' => 'Gender',
            'birthdate' => 'Birthdate',
            'province' => 'Province',
            'city' => 'City',
            'district' => 'District',
            'address' => 'Address',
            'postalcode' => 'Postalcode',
            'created_at' => 'Created At',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }


    public function beforeSave($insert) {

        if(isset($this->password)) {

            $this->password = bin2hex($this->password);
            $this->authKey = sha1($this->email);
            $this->created_at = date('Y-m-d H:i:s');
}

        return parent::beforeSave($insert);
    }
}
