<?php
/**
 * @author: stefan.petovsky@gmail.com
 * @license MIT
 */

namespace Webcore\Validation;


use InvalidArgumentException;

trait AbstractRuleTrait
{
    /**
     * @param string $string
     * @throws InvalidArgumentException
     * @return null
     */
    abstract protected function throwInvalidArgumentMustBe($string);
}
