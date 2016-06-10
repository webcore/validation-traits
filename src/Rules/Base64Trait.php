<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait Base64Trait
{
    use AbstractRuleTrait;

    /**
     * Allowed characters: A-Z, a-z, 0-9, +, /, =
     *
     * @param $value
     */
    private function validateBase64($value)
    {
        $isNotValid = base64_decode($value, true) === false;
        if ($isNotValid) {
            $this->throwInvalidArgumentMustBe("valid base_64");
        }
    }
}
