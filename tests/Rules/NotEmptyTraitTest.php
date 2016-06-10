<?php
namespace Webcore\Validation\Tests\Rules;

use Webcore\Validation\Rules\NotEmptyTrait;
use Webcore\Validation\Tests\SingleParamsTraitTest;

class NotEmptyTraitTest extends SingleParamsTraitTest
{
    protected function getTestTraitName()
    {
        return NotEmptyTrait::class;
    }

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
