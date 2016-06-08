<?php
namespace Webcore\Validation\Tests\Validation;

use Webcore\Validation\Tests\ValidationTraitBaseTest;

class ValidationBoolTest extends ValidationTraitBaseTest
{
    protected function getTestMethodName()
    {
        return "validateBool";
    }

    public function provideInvalidValues()
    {
        return [
            [1.2],
            [-10.1],
            [1.2e3],
            [7E-10],
            [0],
            [1234],
            [-100023],
            [new \stdClass()],
            [array()],
            [null],
            ["Lorem Ipsum"],
            ["1234"],
            ["
            
            
            "],
            ["\n\n\n"],
        ];
    }

    public function provideValidValues()
    {
        return [
            [true],
            [false],
        ];
    }
}