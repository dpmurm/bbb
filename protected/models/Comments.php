<?php
class Comments extends CActiveRecord
{
    public $verifyCode;
    public $guestlogin = "Гость";

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'comments';
    }
    public function relations()
    {
        return array(
            // делаем привязку комментария к пользователю. что бы иметь возможность
            // получить его логин вместо id_user
            'user' => array(self::BELONGS_TO, 'User', 'id_user'),
        );
    }
    public function attributeLabels()
    {
        return array(
            'verifyCode' => 'Код',
            'login'      => 'Имя',
        );
    }
    
    public function rules()
    {
        return array(
            // логин может содержать только англ и рус буквы, плюс цифры.
            array('login', 'match', 'pattern' =>'/^[A-Za-z0-9А-Яа-я\_\-\s,]+$/u','message' => 'Логин содержит недопустимые символы.'),
            // логин, пароль не должны быть больше 128-и символов, и меньше трёх
            array('login', 'length', 'max'=>128, 'min' => 3),
			array('text', 'required'),
            // проверка капчи
            array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
        );
    }
	
	public function safeAttributes()
    {
        return array('verifyCode', 'text', 'login');
    }
}