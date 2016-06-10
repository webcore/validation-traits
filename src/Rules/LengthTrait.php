<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait LengthTrait
{
    use AbstractRuleTrait;

    private function validateLength($value, $length)
    {
        $realLength = strlen($value);
        if ($realLength !== $length) {
            $this->throwInvalidArgumentMustBe($length." characters long");
        }
    }
}
