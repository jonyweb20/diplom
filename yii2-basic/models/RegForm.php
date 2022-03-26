<?php

namespace app\models;

use yii\base\Model;

class RegForm extends Model
{
public $username;
public $password;
public $email;
public $text;
public function attributeLabels()
{
    return [
        'username'=>'Имя',
        'email'=>'E-mail',
        'password'=>'Пароль',
        'text'=>'Текст сообщения'
    ];
}
public function rules()
{
    return [
        [['username','password','email'],'required', /*'message'=>'Поля обязательны'*/],
        ['username', 'string', 'length'=>[4,10]],
        ['username', 'myRule'],
        ['email', 'email'],
       /* ['name', 'string','min'=>2, 'tooShort'=>'Мало']*/
        ['text', 'trim']
    ];
}
public function myRule($attrs){
    if (!in_array($this->$attrs,['hello','world'])){
     $this->addError($attrs, 'Вам отказано в доступе') ;
    }
}
}