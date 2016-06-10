<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait NotEmptyTrait
{
    use AbstractRuleTrait;

    private function validateNotEmpty($value)
    {
        if ($value === null) {
            $this->throwInvalidArgumentMustBe("not empty");
        }
    }
}
