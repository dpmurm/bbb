<?php
/**
 * Created by PhpStorm.
 * User: dp_murm
 * Date: 27.08.14
 * Time: 11:57
 */
class User extends CActiveRecord
{
    // для капчи
    public $verifyCode;
    // для поля "повтор пароля"
    public $passwd2;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function tableName()
    {
        return 'user';
    }


    /**
     * Правила валидации
     */
    public function rules()
    {
        return array(
            // логин, пароль не должны быть больше 128-и символов, и меньше трёх
            array('login, passwd', 'length', 'max'=>128, 'min' => 3),
            // логин, пароль не должны быть пустыми
            array('login, passwd', 'required'),
            array('passwd2', 'required', 'on'=>'registration'),
            // для сценария registration поле passwd должно совпадать с полем passwd2
            array('passwd', 'compare', 'compareAttribute'=>'passwd2', 'on'=>'registration'),
            // правило для проверки капчи что капча совпадает с тем что ввел пользователь
            array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
            array('login', 'match', 'pattern' => '/^[A-Za-z0-9А-Яа-я\s,]+$/u','message' => 'Логин содержит недопустимые символы.'),
            array('passwd', 'authenticate', 'on' => 'login'),
        );
    }

    /**
     * Список атрибутов которые могут быть массово присвоены
     * в любом из наших сценариев
     *
     * @return unknown
     */
    public function safeAttributes()
    {
        return array('login', 'passwd', 'passwd2', 'verifyCode');
    }

    /**
     * Список синонимов
     */
    public function attributeLabels()
    {
        return array(
            'login'      => 'Логин',
            'passwd'  => 'Пароль',
            'passwd2' => 'Повтори пароль',
        );
    }

    /**
     * Собственное правило для проверки
     * Данный метод является связующем звеном с UserIdentity
     *
     * @param $attribute
     * @param $params
     */
    public function authenticate($attribute,$params)
    {
        // Проверяем были ли ошибки в других правилах валидации.
        // если были - нет смысла выполнять проверку
        if(!$this->hasErrors())
        {
            // Создаем экземпляр класса UserIdentity
            // и передаем в его конструктор введенный пользователем логин и пароль (с формы)
            $identity= new UserIdentity($this->login, $this->passwd);
            // Выполняем метод authenticate (о котором мы с вами говорили пару абзацев назад)
            // Он у нас проверяет существует ли такой пользователь и возвращает ошибку (если она есть)
            // в $identity->errorCode
            $identity->authenticate();

            // Теперь мы проверяем есть ли ошибка..
            switch($identity->errorCode)
            {
                // Если ошибки нету...
                case UserIdentity::ERROR_NONE: {
                    // Данная строчка говорит что надо выдать пользователю
                    // соответствующие куки о том что он зарегистрирован, срок действий
                    // у которых указан вторым параметром.
                    Yii::app()->user->login($identity, 0);
                    break;
                }
                case UserIdentity::ERROR_USERNAME_INVALID: {
                    // Если логин был указан наверно - создаем ошибку
                    $this->addError('login','Пользователь не существует!');
                    break;
                }
                case UserIdentity::ERROR_PASSWORD_INVALID: {
                    // Если пароль был указан наверно - создаем ошибку
                    $this->addError('passwd','Вы указали неверный пароль!');
                    break;
                }
            }
        }
    }

}
