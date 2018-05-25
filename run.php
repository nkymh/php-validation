<?php

require_once('vendor/autoload.php');

use nkymh\validation\ConcreteFactory;


$va = new ConcreteFactory();

echo "ipv4 = " . $va->createProduct('IPv4')->getName() . "\n";

echo "ipv6 = " . $va->createProduct('IPv6')->getName() . "\n";

