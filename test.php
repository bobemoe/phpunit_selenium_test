<?php
namespace App\Tests;

use PHPUnit\Extensions\Selenium2TestCase;

class Test extends Selenium2TestCase{

    protected function setUp(): void {
        parent::setUp();
        $this->setHost('localhost');
        $this->setPort(4444);
        $this->setBrowserUrl('http://localhost');
        $this->setBrowser('chrome');
    }

    public function test(){
      $this->assertTrue(true);
   }

}

