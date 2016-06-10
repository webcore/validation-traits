<?php


namespace Webcore\Validation\Tests;


use InvalidArgumentException;

abstract class ThreeParamsTraitTest extends RulesBaseTest
{
    /**
     * @dataProvider provideInvalidValues
     * @param $valueFoo
     * @param $firstConstraint
     * @param $secondConstraint
     */
    public function testValidateWithInvalidValue($valueFoo, $firstConstraint, $secondConstraint)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$valueFoo, $firstConstraint, $secondConstraint]);
    }

    /**
     * @dataProvider provideValidValues
     * @param $valueFoo
     * @param $firstConstraint
     * @param $secondConstraint
     */
    public function testValidateWithValidValue($valueFoo, $firstConstraint, $secondConstraint)
    {
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$valueFoo, $firstConstraint, $secondConstraint]);
    }
}
