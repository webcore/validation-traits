# Validation traits

[![Travis](https://img.shields.io/travis/webcore/validation-traits.svg?maxAge=2592000)](https://travis-ci.org/webcore/validation-traits)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/6a166fab-ddf0-4d5c-b605-09f6681f8795.svg?maxAge=2592000)](https://insight.sensiolabs.com/projects/6a166fab-ddf0-4d5c-b605-09f6681f8795)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/webcore/validation-traits.svg?maxAge=2592000)](https://scrutinizer-ci.com/g/webcore/validation-traits/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/webcore/validation-traits/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/webcore/validation-traits/?branch=master)
[![Dependency Status](https://www.versioneye.com/user/projects/575827ac7757a0004a1de479/badge.svg?style=plastic)](https://www.versioneye.com/user/projects/575827ac7757a0004a1de479)
[![license](https://img.shields.io/github/license/webcore/validation-traits.svg?maxAge=2592000)](https://opensource.org/licenses/MIT)

### Example

Let's define simple token class with 3 rules:

```php
<?php

use Webcore\Validation\ValidationTrait;
use Webcore\Validation\ValidationValueBoxTrait;

class Token
{
    use ValidationTrait, ValidationValueBoxTrait;

    protected function validation($value)
    {
        $this->validateNotEmpty($value);
        $this->validateBase64($value);
        $this->validateLength($value, 64);
    }
}
```

```php
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

```

### TODO

- divide into single traits for each validation

### MIT license

Copyright (c) 2016, Štefan Peťovský
