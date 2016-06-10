<?php

use Webcore\Validation\Rules\Base64Trait;
use Webcore\Validation\Rules\LengthTrait;
use Webcore\Validation\Rules\NotEmptyTrait;
use Webcore\Validation\SingleValueObjectInterface;
use Webcore\Validation\SingleValueObjectTrait;

class Token implements SingleValueObjectInterface
{
    use SingleValueObjectTrait, NotEmptyTrait, Base64Trait, LengthTrait;

    protected function validation($value)
    {
        $this->validateNotEmpty($value);
        $this->validateBase64($value);
        $this->validateLength($value, 64);
    }
}
