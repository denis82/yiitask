<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace tests;

class TestCases
{
    public function setUp() {
     
    }    

    public function tearDown() {

    }
    
    protected function assert($condition, $message = '')
    {
        echo $message;
        if($condition) {
            echo ' Ok '.PHP_EOL;
        } else {
            echo ' false '.PHP_EOL;
            exit();
        }
    }
    
     protected function assertTrue($condition, $message = '')
    {
        $this->assert($condition === true, $message);
    }
    
    protected function assertFalse($condition, $message = '')
    {
        $this->assert($condition === false, $message);
    }
    
    protected function assertArrayHasKey($key,$array, $message = '')
    {
        $this->assert(array_key_exists($key,$array), $message);
    }
}

