<?php

use PHPUnit\Framework\TestCase;
use nkymh\validation\IPv4\IPv4ConcreteValidator;

class IPv4ConcreteValidatorTest extends TestCase
{
    private $obj;
    private $cov;
    
    public function setup()
    {
        $this->obj = new IPv4ConcreteValidator();
    }
    
    public function testvalidate()
    {
        for($i = 0; $i <= 9; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertTrue($this->obj->address($test)->validate(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertTrue($this->obj->address($test)->validate(), "\"$test\" is not IPv4.");
            $test = '00' . strval($i) . '.00' . strval($i) . '.00' . strval($i) . '.00' . strval($i);
            $this->assertTrue($this->obj->address($test)->validate(), "\"$test\" is not IPv4.");
        }
        for($i = 10; $i <= 99; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertTrue($this->obj->address($test)->validate(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertTrue($this->obj->address($test)->validate(), "\"$test\" is not IPv4.");
        }
        for($i = 100; $i <= 255; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertTrue($this->obj->address($test)->validate(), "\"$test\" is not IPv4.");
        }
        for($i = 256; $i <= 999; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertFalse($this->obj->address($test)->validate(), "\"$test\" is not IPv4.");
        }
        
    }
    
    public function testGetName()
    {
        $this->assertEquals('IPv4 Validator', $this->obj->getName());
    }

    public function testClear()
    {
        $this->assertFalse($this->obj->address('192.168.1.300')->validate());
        $this->obj->clear();
        $this->assertTrue($this->obj->validate());
    }
    
    public function testGetBroadCastAddress()
    {
        $this->assertEquals('255.255.255.255', $this->obj->getBroadCastAddress());
        $this->assertEquals('192.168.1.255', $this->obj->address('192.168.1.0')->netmask('255.255.255.0')->getBroadCastAddress());
    }
    
    public function testGetAddress()
    {
        for($i = 0; $i <= 9; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertEquals($test, $this->obj->address($test)->getAddress(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($test, $this->obj->address($test)->getAddress(), "\"$test\" is not IPv4.");
            $test = '00' . strval($i) . '.00' . strval($i) . '.00' . strval($i) . '.00' . strval($i);
            $this->assertEquals($test, $this->obj->address($test)->getAddress(), "\"$test\" is not IPv4.");
        }
        for($i = 10; $i <= 99; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertEquals($test, $this->obj->address($test)->getAddress(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($test, $this->obj->address($test)->getAddress(), "\"$test\" is not IPv4.");
        }
        for($i = 100; $i <= 255; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertEquals($test, $this->obj->address($test)->getAddress(), "\"$test\" is not IPv4.");
        }
    }
    
    public function testGetAddressValue()
    {
        for($i = 0; $i <= 9; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $value = ($i << 24) + ($i << 16) + ($i << 8) + $i;
            $this->assertEquals($value, $this->obj->address($test)->getAddressValue(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($value, $this->obj->address($test)->getAddressValue(), "\"$test\" is not IPv4.");
            $test = '00' . strval($i) . '.00' . strval($i) . '.00' . strval($i) . '.00' . strval($i);
            $this->assertEquals($value, $this->obj->address($test)->getAddressValue(), "\"$test\" is not IPv4.");
        }
        for($i = 10; $i <= 99; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $value = ($i << 24) + ($i << 16) + ($i << 8) + $i;
            $this->assertEquals($value, $this->obj->address($test)->getAddressValue(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($value, $this->obj->address($test)->getAddressValue(), "\"$test\" is not IPv4.");
        }
        for($i = 100; $i <= 255; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $value = ($i << 24) + ($i << 16) + ($i << 8) + $i;
            $this->assertEquals($value, $this->obj->address($test)->getAddressValue(), "\"$test\" is not IPv4.");
        }
    }

    public function testGetetmask()
    {
        for($i = 0; $i <= 9; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertEquals($test, $this->obj->netmask($test)->getNetmask(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($test, $this->obj->netmask($test)->getNetmask(), "\"$test\" is not IPv4.");
            $test = '00' . strval($i) . '.00' . strval($i) . '.00' . strval($i) . '.00' . strval($i);
            $this->assertEquals($test, $this->obj->netmask($test)->getNetmask(), "\"$test\" is not IPv4.");
        }
        for($i = 10; $i <= 99; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertEquals($test, $this->obj->netmask($test)->getNetmask(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($test, $this->obj->netmask($test)->getNetmask(), "\"$test\" is not IPv4.");
        }
        for($i = 100; $i <= 255; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $this->assertEquals($test, $this->obj->netmask($test)->getNetmask(), "\"$test\" is not IPv4.");
        }
    }
    
    public function testGetetmaskValue()
    {
        for($i = 0; $i <= 9; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $value = ($i << 24) + ($i << 16) + ($i << 8) + $i;
            $this->assertEquals($value, $this->obj->netmask($test)->getNetmaskValue(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($value, $this->obj->netmask($test)->getNetmaskValue(), "\"$test\" is not IPv4.");
            $test = '00' . strval($i) . '.00' . strval($i) . '.00' . strval($i) . '.00' . strval($i);
            $this->assertEquals($value, $this->obj->netmask($test)->getNetmaskValue(), "\"$test\" is not IPv4.");
        }
        for($i = 10; $i <= 99; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $value = ($i << 24) + ($i << 16) + ($i << 8) + $i;
            $this->assertEquals($value, $this->obj->netmask($test)->getNetmaskValue(), "\"$test\" is not IPv4.");
            $test = '0' . strval($i) . '.0' . strval($i) . '.0' . strval($i) . '.0' . strval($i);
            $this->assertEquals($value, $this->obj->netmask($test)->getNetmaskValue(), "\"$test\" is not IPv4.");
        }
        for($i = 100; $i <= 255; $i++)
        {
            $test = strval($i) . '.' . strval($i) . '.' . strval($i) . '.' . strval($i);
            $value = ($i << 24) + ($i << 16) + ($i << 8) + $i;
            $this->assertEquals($value, $this->obj->netmask($test)->getNetmaskValue(), "\"$test\" is not IPv4.");
        }
    }

    public function tearDown()
    {
        $this->obj = null;
    }
}