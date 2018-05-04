<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use app\models\CategoryQuery;
use \yii\web\IdentityInterface;
use valentinek\behaviors\ClosureTable;
use valentinek\behaviors\ClosureTableQuery;

class User extends ActiveRecord  implements \yii\web\IdentityInterface
{
	public $authKey;
	public $leaf;

	public function behaviors() {
		return [
			[
				'class' => ClosureTable::className(),
				'tableName' => 'usersTree'
			],
		];
	}

	public static function find()
	{
		return new CategoryQuery(static::className());
	}
    
	public function rules() {
		return [
		    // username and password are both required
		    [['login', 'password'], 'required'],
		    // rememberMe must be a boolean value
		    [['login'], 'unique'],
		    [['name', 'login'], 'string', 'max' => 255],
		    [['name' , 'login', 'password'] , 'safe'], 
		    
		];
	}

        /**
	* @return string имя таблицы
	*/
	public static function tableName()
	{
	        return "{{%users}}" ;
	}
 
	public function attributeLabels()
	{
		return [
		    'name' => 'Имя',
		    'login' => 'Логин',
		    'password' => 'Пароль'
		];
	}
    
	public function hashPass($password)
	{
		$this->password = sha1($password);
	}
	
	public function comparePassowrd($password)
	{
		$hashPassword = $this->password;
		$this->hashPass($password);
		return $hashPassword === $this->password;
	}
	
	
	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id]);
	}
	
	public static function findIdentityByAccessToken( $token, $type = null )
	{

	}
	
	public function getId()
	{

	    return $this->getPrimaryKey();
	}
	
	public function getAuthKey()
	{
		return $this->authKey;
	}
	
	public function validateAuthKey($authKey)
	{
		return $this->authKey === $authKey;
	}
	
    
}
