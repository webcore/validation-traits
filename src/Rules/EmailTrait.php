<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait EmailTrait
{
    use AbstractRuleTrait;

    /**
     * "I found some addresses that FILTER_VALIDATE_EMAIL rejects, but RFC5321 permits"
     * http://php.net/manual/en/function.filter-var.php#112492
     *
     * @param $value
     */
    private function validateEmail($value)
    {
        $isValid = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid email");
        }
    }
}
