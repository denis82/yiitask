<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;


class Invite extends Model
{
	public $email;
	public $link;


		/**
	* @return string имя таблицы
	*/
	public static function tableName()
	{
	    return "{{%inviteToken}}" ;
	}
	
	/**
	* @return array the validation rules.
	*/
	public function rules()
	{
		return [
		    [['email'], 'required'],
		    ['email', 'email'],
		];
	}

	/**
	* 
	*/
	public function send()
	{
	    
		$res = Yii::$app->mailer->compose()
		    ->setFrom(Yii::$app->user->identity->attributes['login']) //'info@rusultras.ru')//
		    ->setTo($this->email)
		    ->setSubject('Приглашение зарегистрироваться')
		    ->setHtmlBody('<b>Пришло время пройти по <a href="' . Url::to('@web/site/index', true) . '?token=' . Yii::$app->user->identity->attributes['inviteToken'] . '" > ссылке </a> и зарегистрироваться</b>')
		    ->send();
		return $res;
	}
	
	
	/**
	* 
	*/
	public function attributeLabels()
	{
		return [
		    'verifyCode' => 'Verification Code',
		];
	}


}
