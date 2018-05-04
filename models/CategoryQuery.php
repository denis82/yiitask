<?php

namespace app\models;

use yii\db\ActiveQuery;
use valentinek\behaviors\ClosureTableQuery;


class CategoryQuery extends ActiveQuery
{
	public function behaviors() {
		return [
			[
				'class' => ClosureTableQuery::className(),
				'tableName' => 'usersTree'
			],
		];
	}
}