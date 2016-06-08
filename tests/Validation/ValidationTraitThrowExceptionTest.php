<?php
namespace Webcore\Validation\Tests\Validation;

use InvalidArgumentException;
use Webcore\Validation\Tests\ValidationBaseTest;

class ValidationThrowExceptionTest extends ValidationBaseTest
{
    protected function getTestMethodName()
    {
        return "throwInvalidArgumentMustBe";
    }

    /**
     * @dataProvider provideValues
     * @param $value
     */
    public function testThrowInvalidArgumentMustBe($value)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp("/must be ".$value."$/");
        $this->invokeMethod($this->traitObject, $this->getTestMethodName(), [$value]);
    }

    public function provideValues()
    {
        return [
            ["string"],
            ["bool"],
            ["hexa",],
        ];
    }
}