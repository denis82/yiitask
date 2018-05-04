<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\base\Security;

class Registration extends Model
{
	public $name;
	public $login;
	public $password;
	public $rpassword;
	private $group = 1;
	public $errors = [];
	
	/**
	* @var array
	*/
	public $dataResult = [];
	
	public function rules()
	{
		return [
		
			[['login','password','name'], 'required','message'=>'Обязательно для заполнения {attribute}.'],
			['login','email'],
			['login','unique', 'targetClass' => 'app\models\User'],
			['password','string','min' => 5,'max' => 10 ],
			['password', 'compare', 'compareAttribute' => 'rpassword'],
			['name', 'string', 'length' => [2, 35]],
			[['login','password','name','rpassword'],'safe']
		];
	}
	       
	/**
	* Создает запись пользователя в базе
	* @return bool
	*/
	
	public function runReg()
	{
		$userModel = new User();
		$userModel->login = $this->login;
		$userModel->name = $this->name;
		$userModel->inviteToken = md5($this->login);
		$userModel->hashPass($this->password);
		if ( $userModel->save() ) {
			$modelLogin = new Login();
			$modelLogin->login = $this->login;
			$modelLogin->password = $this->password;
			$modelLogin->login();
			$modelUsersRef = new UsersRef();
			$modelUsersRef->childId = $userModel->id;
			$modelUsersRef->run();
			return true;
		}
	    

	} 
    
	public function attributeLabels()
	{
		return [
		    'name' => 'Имя',
		    'login' => 'Логин',
		    'password' => 'Пароль',
		    'userIp' => 'ip адрес',
		    'token' => 'Токен',
		    'surname' => 'Фамилия',
		    'middlename' => 'Отчество',
		    'company' => 'Компания',
		    'work' => 'Должность',
		    'phone' => 'Телефон',
		];
	}
}
