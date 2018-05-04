<?php

use yii\db\Migration;

class m170207_200823_createUsersTable extends Migration
{
public function up()
{
$this->createTable('{{users}}', [
'id' => $this->primaryKey(),
'name' => $this->string()->notNull(),
'login' => $this->string()->notNull(),
'password' => $this->string()->notNull(),
'inviteToken' => $this->string()->notNull()
]);
}

public function down()
{
$this->dropTable('{{users}}');
}
}
