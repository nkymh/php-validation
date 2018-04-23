<?php

require_once('vendor/autoload.php');

use sample\Calc;


$obj = new Calc();

echo '4+3=' . $obj->plus(4,3);


