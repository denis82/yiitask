<?php

namespace tests;

use app\models\User;
use Yii;

require(__DIR__ . '/_bootstrap.php');

class  UserTest extends TestCases
{
    
    /*
    public function testValidateEmptyValues() {
        
        $user = new User();
        $this->assertFalse($user->validate(),' empty val ');
        $this->assertArrayHasKey('username', $user->getErrors(),'check empty username arrors');
        $this->assertArrayHasKey('email', $user->getErrors(),'check empty email arrors');
        
    }
    
      public function testValidateWrongValues() {
        
        $user = new User([
            'username' => 'Wrong % Username',
            'email' => 'wrong_email',
        ]);
        $this->assertFalse($user->validate(),' empty val ');
        $this->assertArrayHasKey('username', $user->getErrors(),'check empty username arrors');
        $this->assertArrayHasKey('email', $user->getErrors(),'check empty email arrors');
        
    }
    
      public function testValidateCorrectValues() {
        
        $user = new User([
            'username' => 'CorrectUsername',
            'email' => 'Correct@email.com',
        ]);
        $this->assertTrue($user->validate(),' correct mosel is val ');
        
    }*/
    public function setUp() {
        parent::setUp();
        User::deleteAll();
        Yii::$app->db->createCommand()->insert(User::tableName(),[
            'username' => 'user',
            'email' => 'user@email.com',
        ])->execute();
    }    
    
     public function testValidateExistedValues() {
        
        $user = new User([
            'username' => 'user',
            'email' => 'user@email.com',
        ]);
        $this->assertFalse($user->validate(),' empty val ');
        $this->assertArrayHasKey('username', $user->getErrors(),'check empty username arrors');
        $this->assertArrayHasKey('email', $user->getErrors(),'check empty email arrors');
        
    }
    
     public function testSaveIntoDataBase() {
        
        $user = new User([
            'username' => 'CorrectUsername',
            'email' => 'Correct@email.com',
        ]);
        $this->assertTrue($user->save(),' mosel is saved ');
        
    }
}



$class = new \ReflectionClass('\tests\UserTest');
foreach($class->getMethods() as $method) {
    if(substr($method->name, 0, 4) == 'test') {
        echo 'Test' . $method->class . '::' . $method->name . PHP_EOL .PHP_EOL;
        $test = new $method->class;
        $test->setUp();
        $test->{$method->name}();
        $test->tearDown();
        echo PHP_EOL;
    } 
    
}
        
        //$model->username = 'denis';
        //$model->email = 'denis@df.ru';
       

//echo Yii::$app->name.PHP_EOL;