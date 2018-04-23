<?php

namespace sample;

class Calc
{
    function __construct(){}
    function __destruct(){}
    
    public function plus($x, $y)
    {
        return($x + $y);
    }
    
    public function minus($x, $y)
    {
        return($x - $y);
    }
}