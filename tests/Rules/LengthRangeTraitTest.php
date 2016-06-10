<?php
namespace Webcore\Validation\Tests\Rules;

use Webcore\Validation\Rules\LengthRangeTrait;
use Webcore\Validation\Tests\ThreeParamsTraitTest;

class LengthRangeTraitTest extends ThreeParamsTraitTest
{
    protected function getTestTraitName()
    {
        return LengthRangeTrait::class;
    }

    protected function getTestMethodName()
    {
        return "validateLengthRange";
    }

    public function provideInvalidValues()
    {
        return [
            ["aaa", 1, 2],
            ["", 1, 0],
            ["Lorem", 0, 4],
            ["Lorem", 10, 50]
        ];
    }

    public function provideValidValues()
    {
        return [
            ["", 0, 0],
            ["", 0, 100],
            ["Lorem", 0, 50],
            ["Lorem", 1, 5],
            ["Lorem", 4, 5],
            ["Lorem", 5, 5],
            ["12345678901234567890", 0, 20],
            ["12345678901234567890", 0, 20],
            ["12345678901234567890", 10, 50]
        ];
    }
}
