<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait FloatTrait
{
    use AbstractRuleTrait;

    private function validateFloat($value)
    {
        if (!is_float($value)) {
            $this->throwInvalidArgumentMustBe("float");
        }
    }
}
