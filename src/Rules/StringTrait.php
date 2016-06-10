<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait StringTrait
{
    use AbstractRuleTrait;

    private function validateString($value)
    {
        if (!is_string($value)) {
            $this->throwInvalidArgumentMustBe("string");
        }
    }
}
