<?php
namespace Webcore\Validation\Tests\Rules;

use Webcore\Validation\Rules\BoolTrait;
use Webcore\Validation\Tests\SingleParamsTraitTest;

class BoolTraitTest extends SingleParamsTraitTest
{
    protected function getTestTraitName()
    {
        return BoolTrait::class;
    }

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
