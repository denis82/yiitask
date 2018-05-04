<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users_group}}".
 *
 * @property integer $id
 * @property string $ident
 * @property string $name
 */
class UsersTree extends \yii\db\ActiveRecord
{
	/**
	* @inheritdoc
	*/
	public static function tableName()
	{
		return '{{%usersTree}}';
	}

	/**
	* @inheritdoc
	*/
	public function rules()
	{
		return [
		    [['parent', 'child','deep'], 'integer'],
		];
	}

	/**
	* @inheritdoc
	*/
	public function attributeLabels()
	{
		return [
		    'id' => 'ID',
		    'ident' => 'Ident',
		    'name' => 'Name',
		];
	}
}
