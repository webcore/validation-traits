<?php
/**
 * @author: stefan.petovsky@gmail.com
 * @license MIT
 */

namespace Webcore\Validation;


use InvalidArgumentException;
use ReflectionClass;

trait ValidationTrait
{
    private function validateString($value)
    {
        if (!is_string($value)) {
            $this->throwInvalidArgumentMustBe("string");
        }
    }

    private function validateInteger($value)
    {
        if (!is_integer($value)) {
            $this->throwInvalidArgumentMustBe("integer");
        }
    }

    private function validateFloat($value)
    {
        if (!is_float($value)) {
            $this->throwInvalidArgumentMustBe("float");
        }
    }

    private function validateBool($value)
    {
        if (!is_bool($value)) {
            $this->throwInvalidArgumentMustBe("boolean");
        }
    }

    /**
     * Allowed characters: A-Z, a-z, 0-9, +, /, =
     *
     * @param $value
     */
    private function validateBase64($value)
    {
        $isNotValid = base64_decode($value, true) === false;
        if ($isNotValid) {
            $this->throwInvalidArgumentMustBe("valid base_64");
        }
    }

    private function validateIpAddress($value)
    {
        $isValid = filter_var($value, FILTER_VALIDATE_IP);
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid ip address");
        }
    }

    /**
     * "I found some addresses that FILTER_VALIDATE_EMAIL rejects, but RFC5321 permits"
     * http://php.net/manual/en/function.filter-var.php#112492
     *
     * @param $value
     */
    private function validateEmail($value)
    {
        $isValid = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid email");
        }
    }

    private function validateUrl($value)
    {
        $isValid = filter_var($value, FILTER_VALIDATE_URL);
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid url");
        }
    }

    /**
     * Allowed characters: 0-9, a-f, A-F
     *
     * @param $value
     */
    private function validateHexadecimal($value)
    {
        $isValid = filter_var(
            $value,
            FILTER_VALIDATE_REGEXP,
            array(
                "options" => array("regexp" => '`^[0-9A-Fa-f]+$`')
            )
        );
        if ($isValid === false) {
            $this->throwInvalidArgumentMustBe("valid hexadecimal");
        }
    }

    public function validateLength($value, $length)
    {
        $realLength = strlen($value);
        if ($realLength !== $length) {
            $this->throwInvalidArgumentMustBe($length." characters long");
        }
    }

    private function validateNotEmpty($value)
    {
        if ($value === null) {
            $this->throwInvalidArgumentMustBe("not empty");
        }
    }

    private function throwInvalidArgumentMustBe($string)
    {
        throw new InvalidArgumentException((new ReflectionClass($this))->getShortName()." must be ".$string);
    }
}
