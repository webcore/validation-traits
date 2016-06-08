<?php
namespace Webcore\Validation\Tests\Validation;

use Webcore\Validation\Tests\ValidationTraitBaseTest;

class ValidationFloatTest extends ValidationTraitBaseTest
{
    protected function getTestMethodName()
    {
        return "validateFloat";
    }

    public function provideInvalidValues()
    {
        return [
            [true],
            [false],
            [1],
            [-10],
            [0],
            ["Lorem"],
            [new \stdClass()],
            [array()],
            [null],
        ];
    }

    public function provideValidValues()
    {
        return [
            [12345.4],
            [-10.1],
            [1.2e3],
            [7E-10]
        ];
    }
}