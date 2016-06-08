<?php
namespace Webcore\Validation\Tests\Validation;

use Webcore\Validation\Tests\ValidationTraitBaseTest;

class ValidationEmptyTest extends ValidationTraitBaseTest
{
    protected function getTestMethodName()
    {
        return "validateNotEmpty";
    }

    public function provideInvalidValues()
    {
        return [
            [null],
        ];
    }

    public function provideValidValues()
    {
        return [
            [true],
            [false],
            [1.2],
            [1234],
            [-100023],
            [new \stdClass()],
            [array()],
            ["adas"],
            ["null"],
            [0],
        ];
    }
}