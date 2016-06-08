<?php


namespace Webcore\Validation\Tests\ValidationValueBox;


use Webcore\Validation\Tests\ValidationBaseTest;
use Webcore\Validation\ValidationValueBoxTrait;

class ValidationValueTraitTest extends ValidationBaseTest
{
    /**
     * @dataProvider provideValidationValueBoxValues
     * @param $value
     */
    public function testConstructAndGetValue($value)
    {
        $mockForTrait = $this->getMockForTrait(ValidationValueBoxTrait::class, [$value]);
        $mockForTrait->expects($this->any())
            ->method('validation')
            ->will($this->returnValue(true));
        $this->assertSame($value, $mockForTrait->getValue());
    }

    public function provideValidationValueBoxValues()
    {
        return [
            ["Lorem Ipsum"],
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
}
