<?php
/**
 * Created by PhpStorm.
 * User: dp_murm
 * Date: 28.08.14
 * Time: 17:37
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    public function authenticate()
    {
        // Есть ли указанный пользователь в базе данных
        $record=User::model()->findByAttributes(array('login'=>$this->username));
        if($record===null)
            // Если нету - сохраняем в errorCode ошибку.
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->passwd!==$this->password)
            // Проверяем совпадает ли введенный пароль с тем что у нас в базе
            // Если не совпадает - сохраняем в errorCode ошибку.
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            // Если все действий выше успешно пройдены - значит
            // пользователь действительно существует и пароль был
            // указан верно.
            $this->_id=$record->id;
            // В errorCode сохраняем что ошибок нет
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}