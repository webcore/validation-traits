<?php


namespace Webcore\Validation\Tests;


use InvalidArgumentException;

abstract class TwoParamsTraitTest extends RulesBaseTest
{
    /**
     * @dataProvider provideInvalidValues
     * @param $valueFoo
     * @param $constraint
     */
    public function testValidateWithInvalidValue($valueFoo, $constraint)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$valueFoo, $constraint]);
    }

    /**
     * @dataProvider provideValidValues
     * @param $valueFoo
     * @param $constraint
     */
    public function testValidateWithValidValue($valueFoo, $constraint)
    {
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$valueFoo, $constraint]);
    }
}
