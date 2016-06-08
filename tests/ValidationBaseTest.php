<?php


namespace Webcore\Validation\Tests;


use PHPUnit_Framework_TestCase;
use ReflectionClass;
use Webcore\Validation\ValidationTrait;

abstract class ValidationBaseTest extends PHPUnit_Framework_TestCase
{
    protected $traitObject;

    public function setUp()
    {
        $this->traitObject = $this->getObjectForTrait(ValidationTrait::class);
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    protected function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}