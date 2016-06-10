<?php


namespace Webcore\Validation\Tests\SingleValueObject;


use InvalidArgumentException;
use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;
use Webcore\Validation\SingleValueObjectInterface;
use Webcore\Validation\SingleValueObjectTrait;
use Webcore\Validation\Tests\InvokeInaccessibleMethodTrait;

class SingleValueObjectTraitTest extends PHPUnit_Framework_TestCase
{
    use InvokeInaccessibleMethodTrait;

    protected function getTestTraitName()
    {
        return SingleValueObjectTrait::class;
    }

    /**
     * @param string $value
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function createMockForTraitWithValue($value)
    {
        $mockForTrait = $this->getMockForTrait($this->getTestTraitName(), [$value]);
        $mockForTrait->expects($this->any())
            ->method('validation')
            ->willReturn(true);

        return $mockForTrait;
    }

    /**
     * @dataProvider provideSingleValueObjectValues
     * @param $value
     */
    public function testConstructAndGetValue($value)
    {
        $mockForTrait = $this->createMockForTraitWithValue($value);
        $this->assertSame($value, $mockForTrait->getValue());
    }

    public function provideSingleValueObjectValues()
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

    /**
     * @dataProvider provideThrowInvalidValues
     * @param $value
     */
    public function testThrowInvalidArgumentMustBe($value)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessageRegExp("/must be ".$value."$/");
        $mockForTrait = $this->createMockForTraitWithValue($value);
        $this->invokeMethod($mockForTrait, "throwInvalidArgumentMustBe", [$value]);
    }

    public function provideThrowInvalidValues()
    {
        return [
            ["string"],
            ["bool"],
            ["hexa",],
        ];
    }

    /**
     * @dataProvider provideSingleValueObjectValues
     * @param $value
     */
    public function testSameValueAs($value)
    {
        $traitFoo = $this->createMockForTraitWithValue($value);
        $traitBar = $this->createMock(SingleValueObjectInterface::class);
        $traitBar->expects($this->any())
            ->method('getValue')
            ->willReturn($value);

        $this->assertTrue($traitFoo->sameValueAs($traitBar));
    }
}
