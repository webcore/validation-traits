<?php
/**
 * @author: stefan.petovsky@gmail.com
 * @license MIT
 */

namespace Webcore\Validation;


trait ValidationValueBoxTrait
{
    private $value;

    public function __construct($value)
    {
        $this->validation($value);
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    abstract protected function validation($value);
}
