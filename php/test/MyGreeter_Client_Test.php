<?php

error_reporting(error_reporting() & ~E_USER_DEPRECATED);
require_once(__DIR__ . '/../vendor/autoload.php');

class MyGreeter_Client_Test extends \PHPUnit_Framework_TestCase {

    public function setUp() {
        date_default_timezone_set("Asia/Shanghai");
        $this->greeter = new \MyGreeter\Client();
    }

    public function test_Instance() {
        $this->assertEquals(
            get_class($this->greeter), 'MyGreeter\Client'
        );
    }

    public function test_getGreeting() {
        $h = intval(date('G'));
        if ($h >= 0 && $h < 12) {
            $this->assertEquals(
                $this->greeter->getGreeting($h), 'Good morning'
            );
        } elseif ($h >= 12 && $h < 18) {
            $this->assertEquals(
                $this->greeter->getGreeting($h), 'Good afternoon'
            );
            $greeting = 'Good afternoon';
        } elseif ($h >= 18 && $h < 24) {
            $this->assertEquals(
                $this->greeter->getGreeting($h), 'Good evening'
            );
        }
    }

    /**
     * @expectedException Exception
     */
    public function test_getGreeting_exception(){
        $i = rand(1, 24);
        $this->greeter->getGreeting(0-$i);
        $this->greeter->getGreeting(24+$i);
    }

    public function test_getGreeting_goodMorning(){
        for($i=1;$i<12;$i++){
            $this->assertEquals(
                $this->greeter->getGreeting($i), 'Good morning'
            );
        }
    }

    public function test_getGreeting_goodEvening(){
        for($i=18;$i<24;$i++){
            $this->assertEquals(
                $this->greeter->getGreeting($i), 'Good evening'
            );
        }
    }

    public function test_getGreeting_goodAfternoon(){
        for($i=12;$i<18;$i++){
            $this->assertEquals(
                $this->greeter->getGreeting($i), 'Good afternoon'
            );
        }
    }
}