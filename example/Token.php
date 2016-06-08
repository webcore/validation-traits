<?php

use Webcore\Validation\ValidationTrait;
use Webcore\Validation\ValidationValueBoxTrait;

class Token
{
    use ValidationTrait, ValidationValueBoxTrait;

    protected function validation($value)
    {
        $this->validateNotEmpty($value);
        $this->validateBase64($value);
        $this->validateLength($value, 64);
    }
}
