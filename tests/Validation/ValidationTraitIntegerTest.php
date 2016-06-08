<?php
namespace Webcore\Validation\Tests\Validation;

use Webcore\Validation\Tests\ValidationTraitBaseTest;

class ValidationIntegerTest extends ValidationTraitBaseTest
{
    protected function getTestMethodName()
    {
        return "validateInteger";
    }

    public function provideInvalidValues()
    {
        return [
            [true],
            [false],
            [1.2],
            [-10.1],
            [1.2e3],
            [7E-10],
            ["Lorem"],
            ["1234"],
            ["
            
            
            "],
            ["\n\n\n"],
            [new \stdClass()],
            [array()],
            [null],
        ];
    }

    public function provideValidValues()
    {
        return [
            [12345],
            [-10],
            [0],
        ];
    }
}