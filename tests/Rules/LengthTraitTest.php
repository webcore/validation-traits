<?php
namespace Webcore\Validation\Tests\Rules;

use Webcore\Validation\Rules\LengthTrait;
use Webcore\Validation\Tests\TwoParamsTraitTest;

class LengthTraitTest extends TwoParamsTraitTest
{
    protected function getTestTraitName()
    {
        return LengthTrait::class;
    }

    protected function getTestMethodName()
    {
        return "validateLength";
    }

    public function provideInvalidValues()
    {
        return [
            ["aaa", 1],
            ["", -1],
            ["Lorem", 0],
            ["Lorem", 10]
        ];
    }

    public function provideValidValues()
    {
        return [
            ["", 0],
            ["Lorem", 5],
            ["12345678901234567890", 20]
        ];
    }
}
