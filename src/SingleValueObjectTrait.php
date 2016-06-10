<?php
/**
 * @author: stefan.petovsky@gmail.com
 * @license MIT
 */

namespace Webcore\Validation;


use InvalidArgumentException;
use ReflectionClass;

trait SingleValueObjectTrait
{
    private $value;

    public function __construct($value)
    {
        $this->validation($value);
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Compare two SingleValueObject and tells whether they can be considered equal
     *
     * @param  SingleValueObjectInterface $object
     * @return bool
     */
    public function sameValueAs(SingleValueObjectInterface $object)
    {
        $areSame = ($this->value === $object->getValue());
        return $areSame;
    }

    /**
     * @param $string
     * @throws InvalidArgumentException
     */
    protected function throwInvalidArgumentMustBe($string)
    {
        throw new InvalidArgumentException((new ReflectionClass($this))->getShortName()." must be ".$string);
    }

    /**
     * @param $value
     * @return void
     */
    abstract protected function validation($value);
}
