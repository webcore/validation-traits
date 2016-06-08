<?php
namespace Webcore\Validation\Tests\Validation;

use InvalidArgumentException;
use Webcore\Validation\Tests\ValidationBaseTest;

class ValidationLengthTest extends ValidationBaseTest
{
    protected function getTestMethodName()
    {
        return "validateLength";
    }

    /**
     * @dataProvider provideInvalidValues
     * @param $value
     * @param $length
     */
    public function testValidateLengthWithInvalidValues($value, $length)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$value, $length]);
    }

    /**
     * @dataProvider provideValidValues
     * @param $value
     * @param $length
     */
    public function testValidateLengthWithValidValues($value, $length)
    {
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$value, $length]);
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