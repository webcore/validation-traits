<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait IntegerTrait
{
    use AbstractRuleTrait;

    private function validateInteger($value)
    {
        if (!is_integer($value)) {
            $this->throwInvalidArgumentMustBe("integer");
        }
    }
}
