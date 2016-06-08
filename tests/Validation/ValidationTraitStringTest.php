<?php
namespace Webcore\Validation\Tests\Validation;

use Webcore\Validation\Tests\ValidationTraitBaseTest;

class ValidationStringTest extends ValidationTraitBaseTest
{
    protected function getTestMethodName()
    {
        return "validateString";
    }

    public function provideInvalidValues()
    {
        return [
            [true],
            [false],
            [1.2],
            [1234],
            [-100023],
            [new \stdClass()],
            [array()],
            [null],
        ];
    }

    public function provideValidValues()
    {
        return [
            ["Lorem Ipsum"],
            ["1234"],
            ["
            
            
            "],
            ["\n\n\n"],
        ];
    }
}