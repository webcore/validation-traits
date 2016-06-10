<?php
namespace Webcore\Validation\Tests\Rules;

use Webcore\Validation\Rules\StringTrait;
use Webcore\Validation\Tests\SingleParamsTraitTest;

class StringTraitTest extends SingleParamsTraitTest
{
    protected function getTestTraitName()
    {
        return StringTrait::class;
    }

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
