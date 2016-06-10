<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait BoolTrait
{
    use AbstractRuleTrait;

    private function validateBool($value)
    {
        if (!is_bool($value)) {
            $this->throwInvalidArgumentMustBe("boolean");
        }
    }
}
