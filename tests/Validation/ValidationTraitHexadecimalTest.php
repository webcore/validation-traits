<?php
namespace Webcore\Validation\Tests\Validation;

use Webcore\Validation\Tests\ValidationTraitBaseTest;

class ValidationHexadecimalTest extends ValidationTraitBaseTest
{
    protected function getTestMethodName()
    {
        return "validateHexadecimal";
    }

    public function provideInvalidValues()
    {
        return [
            ["1.2"],
            ["-10.1"],
            ["1.2e3"],
            ["7E-10"],
            ["-100023"],
            ["new \\stdClass()"],
            ["array()"],
            ["...!@#$%^&*()){}|<>?!"],
            ["bG9yZW0="],
        ];
    }

    public function provideValidValues()
    {
        return [
            ["abcdef"],
            ["abcdefABCDEF1234567890"],
            ["ABCDEF"],
            ["1234567890"],
            ["3707344A4093822299F31D008"],
        ];
    }
}