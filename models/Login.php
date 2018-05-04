<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use yii\base\Security;
use yii\base\ErrorException;
use app\models\Registration;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
 
class Login extends Model
{
	public $login;
	public $password;
	public $rememberMe = true;

	const SCENARIO_SOCIAL_LOGIN = 'login';
	    
	public function attributeLabels()
	{
		return [
		    'login' => 'Логин',
		    'password' => 'Пароль',
		    'rememberMe' => 'Запомнить меня',

		];
	}
	
	/**
	* @return array the validation rules.
	*/
	
	public function rules()
	{
		return [
		
			[['login', 'password'], 'required'],
			['login', 'email'],
			//['login','email'],
			['rememberMe', 'boolean'],
			['password', 'valPassword'],
		];
	}

	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios[self::SCENARIO_SOCIAL_LOGIN] = ['network','login','code'];
		return $scenarios;
	}
	    
	/**
	* Validates the password.
	* This method serves as the inline validation for password.
	*
	* @param string $attribute the attribute currently being validated
	* @param array $params the additional name-value pairs given in the rule
	*/
	
	public function valPassword($attribute, $params)
	{
		if (!$this->hasErrors()) {
			$modelUsers = $this->getUser();
			
			if(!$modelUsers or !$modelUsers->comparePassowrd($this->password)) {
					$this->addError($attribute, 'Пароль не верный.');
			}	
		}
	}

	/**
	* Logs in a user using the provided username and password.
	* @return boolean whether the user is logged in successfully
	*/
	
	public function login()
	{
		if ($this->validate()) {
			return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
		}
		return false;
	}
    
	/**
	* Получить пользователя по логину
	* @return object
	*/
    
	public function getUser()
	{
		return User::findOne(['login' => $this->login]);   
	}
	
	/**
	*  Возвращяет токен пользователя
	* @return string
	*/
	
	public function getTokenSocial()
	{
		if ($this->token === false) {

			$userToken = $this->getUser();
			if(!$userToken) {
			    return false;
			}
			$userToken->scenario = User::SCENARIO_SOCIAL_REGISTER;
			if(isset($userToken)) {
			    
				if(!$userToken->user_idPerson) {  // если персоны у юзера нет ее необходимо создать
				    $this->setPersonForUser($userToken);
				}
				$generateToken = Yii::$app->security;
				$userToken->access_token = $generateToken->generateRandomString();
				
				if($userToken->validate()) {
				    $userToken->save(false);
				    return $userToken->access_token;
				} else {
				    //return $userToken->errors;
				    return false;
				}

			}  else {
			    return false;
			}
		} else {
		    return false;
		}

	}
	
	
	/**
	* Разлогиниться
	* @return boolean
	*/
	
	public function logout($token = false)
	{
	    if($token) {
		$user = User::find()
			    ->where(['access_token' => explode(' ',$token)[1]])
			    ->one();
		if(isset($user->access_token)) {
		    $user->access_token = '';
		    
		    if ($user->save()) { return true;} else { return false;}
		} else {
		    $this->checkToken  = false;
		    return   false;
		}
	    } else {
		return false;
	    }
	}
}
