<?php

use PHPUnit\Framework\TestCase;
use sample\Calc;

class CalcTest extends TestCase
{
    private $obj;
    private $cov;
    
    public function setup()
    {
        $this->obj = new Calc();
    }
    
    public function testPlus()
    {
        $this->assertEquals(3, $this->obj->plus(1, 2), '1+2 != 3');
        $this->assertEquals(7, $this->obj->plus(3, 4), '3+4 != 7');
    }
    
    public function testMinus()
    {
        $this->assertEquals(-1, $this->obj->minus(1, 2), '1-2 != -1');
        $this->assertEquals( 1, $this->obj->minus(4, 3), '4-3 != 1');
    }
    
    public function tearDown()
    {
        $this->obj = null;
    }
}