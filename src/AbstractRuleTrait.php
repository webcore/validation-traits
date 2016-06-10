<?php
/**
 * @author: stefan.petovsky@gmail.com
 * @license MIT
 */

namespace Webcore\Validation;


trait AbstractRuleTrait
{
    /**
     * @param string $string
     * @throws \InvalidArgumentException
     * @return null
     */
    abstract protected function throwInvalidArgumentMustBe($string);
}
