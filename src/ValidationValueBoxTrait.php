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

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return void
     */
    abstract protected function validation($value);
}
