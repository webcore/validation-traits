<?php


namespace Webcore\Validation\Rules;


use Webcore\Validation\AbstractRuleTrait;

trait IpAddressTrait
{
    use AbstractRuleTrait;

    private function validateIpAddress($value)
    {
        $isValid = filter_var($value, FILTER_VALIDATE_IP);
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid ip address");
        }
    }
}
