<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait UrlTrait
{
    use AbstractRuleTrait;

    private function validateUrl($value)
    {
        $isValid = filter_var($value, FILTER_VALIDATE_URL);
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid url");
        }
    }
}
