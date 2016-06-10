<?php

use Tester\Assert;

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/Token.php";

//valid value
$value = str_repeat('BeerNowThere0sATemporarySolution', 2);
$tokenFoo = new Token($value);
Assert::same("BeerNowThere0sATemporarySolutionBeerNowThere0sATemporarySolution", $tokenFoo->getValue());

//compare with another object of same value
$tokenBar = new Token("BeerNowThere0sATemporarySolutionBeerNowThere0sATemporarySolution");
$areSame = $tokenBar->sameValueAs($tokenFoo);
Assert::true($areSame);

//compare with another object of different value
$value = str_repeat('CraftBeerLovers0', 4); //
$tokenPub = new Token($value);
Assert::same("CraftBeerLovers0CraftBeerLovers0CraftBeerLovers0CraftBeerLovers0", $tokenPub->getValue());
$areSame = $tokenPub->sameValueAs($tokenBar);
Assert::false($areSame);

//invalid values
Assert::exception(
    function () {
        new Token(null);
    },
    InvalidArgumentException::class,
    "Token must be not empty"
);

Assert::exception(
    function () {
        new Token("InvalidTokenLength123456789");
    },
    InvalidArgumentException::class,
    "Token must be 64 characters long"
);

Assert::exception(
    function () {
        $value = str_repeat('?!@#$%^&', 8);
        new Token($value);
    },
    InvalidArgumentException::class,
    "Token must be valid base_64"
);
