<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait LengthRangeTrait
{
    use AbstractRuleTrait;

    private function validateLengthRange($value, $start, $end)
    {
        $realLength = strlen($value);
        if ($realLength < $start || $realLength > $end) {
            $this->throwInvalidArgumentMustBe(" long in range between ".$start." and".$end);
        }
    }
}
