<?php


namespace Webcore\Validation\Tests;


use InvalidArgumentException;
use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;

abstract class RulesBaseTest extends PHPUnit_Framework_TestCase
{
    use InvokeInaccessibleMethodTrait;

    protected $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->createMockForTrait($this->getTestTraitName());
    }

    /**
     * @param string $name
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    private function createMockForTrait($name)
    {
        $mockForTrait = $this->getMockForTrait($name);
        $mockForTrait->expects($this->any())
            ->method('throwInvalidArgumentMustBe')
            ->will($this->throwException(new InvalidArgumentException()));

        return $mockForTrait;
    }

    abstract protected function getTestTraitName();
    abstract protected function getTestMethodName();

    abstract public function provideInvalidValues();
    abstract public function provideValidValues();
}
