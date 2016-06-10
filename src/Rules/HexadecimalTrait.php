<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait HexadecimalTrait
{
    use AbstractRuleTrait;

    /**
     * Allowed characters: 0-9, a-f, A-F
     *
     * @param $value
     */
    private function validateHexadecimal($value)
    {
        $isValid = filter_var(
            $value,
            FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp" => '`^[0-9A-Fa-f]+$`')
            )
        );
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid hexadecimal");
        }
    }
}
