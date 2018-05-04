<?php

namespace app\controllers;

use Yii;

use app\models\User;
use app\models\Login;
use app\models\Invite;
use yii\web\Controller;
use app\models\UsersRef;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\filters\VerbFilter;
use app\models\Registration;
use yii\filters\AccessControl;

class SiteController extends Controller
{

	const DEPTHPARENT = 1;
	const DEPTHCHILDREN = 1;


	/**
	* @inheritdoc
	*/
	public function actions()
	{
	    return [
		'error' => [
		    'class' => 'yii\web\ErrorAction',
		],
		'captcha' => [
		    'class' => 'yii\captcha\CaptchaAction',
		    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
		],
	    ];
	}

	/**
	* Домашняя
	*
	* @return string
	*/
	public function actionIndex()
	{   
		$modelUsersRef = new UsersRef();
		$getToken = Yii::$app->request->get('token');
		$modelUsersRef->session($getToken);
		return $this->render('index');
	}
	
	/**
	* .
	*
	* @return string
	*/
	public function actionInvite()
	{
		$modelInvite = new Invite();
		$post = Yii::$app->request->post();
		if (isset ($post) ) {
			$modelInvite->attributes = $post;
			
			if ( $modelInvite->validate() ) {
				$result = $modelInvite->send();
				$this->goHome();
			}
		}
		return $this->render('invite', ['modelInvite' => $modelInvite]);
	}
	
	/**
	* 
	*
	* @return string
	*/
	public function actionProfile()
	{
		$modelUser = new User();
		$parent = $modelUser->find()->ancestorsOf(Yii::$app->user->id, self::DEPTHPARENT)->one();
		$children = $modelUser->find()->descendantsOf(Yii::$app->user->id, self::DEPTHCHILDREN)->all();
		return $this->render('profile',['parent' => $parent, 'children' => $children]);
	}
	
	/**
	* Регистрация пользователя
	* @param string   $_POST['login'] логин пользователя
	* @param string   $_POST['password']  пароль пользователя
	* @param string   $_POST['name']  Имя

	* @return boolean/errors 
	*/
	
	public function actionRegistration()
	{
	  
		$this->layout='/auth';
		$modelRegistration = new Registration();
		$post = Yii::$app->request->post('Registration');
		if ( isset($post) ) {
			$modelRegistration->attributes = Yii::$app->request->post('Registration');
			if ($modelRegistration->validate() and $modelRegistration->runReg()) {
				return $this->goHome();
			}
		}
		return $this->render('registration', [
		    'modelRegistration' => $modelRegistration,
		]);
	}

	/**
	  * Логин.
	  *
	  * @return string
	  */
	  
	public function actionLogin()
	{
		$this->layout='/auth';  
		if (!Yii::$app->user->isGuest) {
		    return $this->goHome();
		}
		$modelLogin = new Login();
		if ( Yii::$app->request->post('Login') ) {
		  
			$modelLogin->attributes = Yii::$app->request->post('Login');
			if ($modelLogin->validate() and $modelLogin->login()) {
				return $this->goHome();
		        }
		}
		return $this->render('login_', [
		    'modelLogin' => $modelLogin,
		]);
	}
	
	/**
	* Logout action.
	*
	* @return string
	*/
	public function actionLogout()
	{
		  
		Yii::$app->user->logout();
		return $this->goHome();
	}

    
}
