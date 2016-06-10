<?php


namespace Webcore\Validation;


interface SingleValueObjectInterface
{
    /**
     * @return mixed
     */
    public function getValue();

    /**
     * Compare two SingleValueObject and tells whether they can be considered equal
     *
     * @param  SingleValueObjectInterface $object
     * @return bool
     */
    public function sameValueAs(SingleValueObjectInterface $object);
}
