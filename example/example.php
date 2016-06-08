<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/Token.php";

//valid value
$value = str_repeat('1234wxyz', 8);
$token = new Token($value);
echo $token->getValue(); // 1234wxyz1234wxyz1234wxyz1234wxyz1234wxyz1234wxyz1234wxyz1234wxyz

//invalid values
try {
    $value = null;
    $token = new Token($value);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage(); //Token must be not empty
}

try {
    $value = "InvalidTokenLength123456789";
    $token = new Token($value);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage(); //Token must be 64 characters long
}

try {
    $value = str_repeat('?!@#$%^&', 8);;
    $token = new Token($value);
} catch (InvalidArgumentException $e) {
    echo $e->getMessage(); //Token must be valid base_64
}
