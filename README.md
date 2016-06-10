[![Travis](https://img.shields.io/travis/webcore/validation-traits.svg?maxAge=2592000)](https://travis-ci.org/webcore/validation-traits)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/6a166fab-ddf0-4d5c-b605-09f6681f8795.svg?maxAge=2592000)](https://insight.sensiolabs.com/projects/6a166fab-ddf0-4d5c-b605-09f6681f8795)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/webcore/validation-traits.svg?maxAge=2592000)](https://scrutinizer-ci.com/g/webcore/validation-traits/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/webcore/validation-traits/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/webcore/validation-traits/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/575827ac7757a0004a1de479/badge.svg?style=plastic)](https://www.versioneye.com/user/projects/575827ac7757a0004a1de479)
[![license](https://img.shields.io/github/license/webcore/validation-traits.svg?maxAge=2592000)](https://opensource.org/licenses/MIT)

# Validation traits

A PHP library/collection of traits aimed to simplify cration of immutable value objects with validation of input value. Basic idea was also inspired by [Laravel's Validation trait for Eloquent models](https://github.com/dwightwatson/validating) and redesign more towards [nicolopignatelli/valueobjects](https://github.com/nicolopignatelli/valueobjects)

[Version 1.0](https://github.com/webcore/validation-traits/tree/v1.0) has less complex attitude on value objects and provide mainly validation via one trait.

## Installation

Via Composer

```
composer require webcore/validation-traits
```

### Example

`SingleValueObjectInterface` define getter method to retrieve value and method for comparing with another value objects implementing this interface.

```php
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
```

Let's define simple `Token` class with 3 rules:

```php
//example/Token.php
<?php
class Token implements SingleValueObjectInterface
{
    use SingleValueObjectTrait, NotEmptyTrait, Base64Trait, LengthTrait;

    protected function validation($value)
    {
        $this->validateNotEmpty($value);
        $this->validateBase64($value);
        $this->validateLength($value, 64);
    }
}
```

And try to create instance of `Token` with valid and invalid values and compare each other:

```php
//example/example.php
<?php
//nette/tester
use Tester\Assert;

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
```

### MIT license

Copyright (c) 2016, Štefan Peťovský
