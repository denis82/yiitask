<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use app\models\UsersTree;

/**
 * This is the model class for table "{{%users_group_ref}}".
 *
 * @property integer $user_id
 * @property integer $group_id
 */
class UsersRef extends Model
{
	public $parentId;
	public $childId;
	public $hash;
	
	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
		    [['user_id', 'group_id'], 'required'],
		    [['user_id', 'group_id'], 'integer'],
		];
	}

	/**
	* @inheritdoc
	*/
	public function run()
	{
	    
		$this->checkInviteUser();
		$modelUser = new User();
		if( null == $this->parentId) {
			$modelUser->find()->markAsRoot(Yii::$app->user->id);
			return false;
		}
		$model = $modelUser->appendTo( $this->parentId, Yii::$app->user->id );

	    
	}
    

	/**
	* @inheritdoc
	*/
	public function session($token)
	{
		$session = Yii::$app->session;
		if ( !$session->isActive ) {
			$session->open();
		}
		$session->set('token', $token);
		$session->close();
		$session->destroy();
	}
    
	
	/**
	* @inheritdoc
	*/
	public function checkInviteUser()
	{
		$session = Yii::$app->session;
		$token = $session->get('token');
		//$token = '7ddaa2a83cbff9df167158825c932ef1';
		if ( $token ) {
			$modelUser = User::find()->where(['inviteToken' => $token])->one();
			$this->parentId = $modelUser->attributes['id'];
		}
		return true;
	}
	
	
	/**
	* @inheritdoc
	*/
	public function addRef()
	{
		$session = Yii::$app->session;
		$token = $session->get('token');
		
		if ( $token ) {
			$modelUsersTree = InviteToken::find()->where(['token' => $token])->one();
			$this->parentId = $modelUsersTree->userId;
		}
		return true;
	}
	
	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
		    'user_id' => 'User ID',
		    'group_id' => 'Group ID',
		];
	}
}
