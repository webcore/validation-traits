<?php


namespace Webcore\Validation\Tests;


use InvalidArgumentException;

abstract class ValidationTraitBaseTest extends ValidationBaseTest
{
    abstract protected function getTestMethodName();

    /**
     * @dataProvider provideInvalidValues
     * @param $value
     */
    public function testValidateWithInvalidValue($value)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$value]);
    }

    /**
     * @dataProvider provideValidValues
     * @param $value
     */
    public function testValidateWithValidValue($value)
    {
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$value]);
    }

    abstract public function provideInvalidValues();

    abstract public function provideValidValues();
}