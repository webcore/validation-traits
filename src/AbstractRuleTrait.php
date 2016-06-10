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
     * @param $string
     * @throws InvalidArgumentException
     */
    abstract protected function throwInvalidArgumentMustBe($string);
}
