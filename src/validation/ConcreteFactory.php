<?php

namespace nkymh\validation;

use nkymh\validation\Factory;

class ConcreteFactory extends Factory
{
    public function createProduct($type)
    {
        switch($type)
        {
            case 'IPv4':
                return new IPv4\IPv4ConcreteValidator();
            case 'IPv6':
                return new IPv6\IPv6ConcreteValidator();
        }
        
        return null;
    }
}
