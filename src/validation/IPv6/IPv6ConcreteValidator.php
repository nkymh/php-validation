<?php

namespace nkymh\validation\IPv6;

use nkymh\validation\IPv6\IPv6Validator;

class IPv6ConcreteValidator implements IPv6Validator
{
    public function getName()
    {
        return "IPv6 Validator";
    }

}