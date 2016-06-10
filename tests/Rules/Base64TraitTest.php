<?php
namespace Webcore\Validation\Tests\Rules;

use Webcore\Validation\Rules\Base64Trait;
use Webcore\Validation\Tests\SingleParamsTraitTest;

class Base64TraitTest extends SingleParamsTraitTest
{
    protected function getTestTraitName()
    {
        return Base64Trait::class;
    }

    protected function getTestMethodName()
    {
        return "validateBase64";
    }

    public function provideInvalidValues()
    {
        return [
            ["1.2"],
            ["-10.1"],
            ["1.2e3"],
            ["7E-10"],
            ["-100023"],
            ["new \\stdClass()"],
            ["array()"],
            ["...!@#$%^&*()){}|<>?!"],
        ];
    }

    public function provideValidValues()
    {
        return [
            ["TG9yZW0gSXBzdW0gamUgZmlrdMOtdm55IHRleHQsIHBvdcW+w612YW7DvSBwcmkgbsOhdnJodSB0bGHEjW92w61uIGEgdHlwb2dyYWZpZS4gTG9yZW0gSXBzdW0gamUgxaF0YW5kYXJkbsO9bSB2w71wbMWIb3bDvW0gdGV4dG9tIHXFviBvZCAxNi4gc3Rvcm/EjWlhLCBrZcSPIG5lem7DoW15IHRsYcSNaWFyIHpvYnJhbCBzYWR6b2JuaWN1IHBsbsO6IHRsYcSNb3bDvWNoIHpuYWtvdiBhIHBvbWllxaFhbCBpY2gsIGFieSB0YWsgdnl0dm9yaWwgdnpvcmtvdsO6IGtuaWh1LiBQcmXFvmlsIG5pZWxlbiBww6TFpSBz"],
            ["bG9yZW0="],
            ["MA=="],
            ["\n\n\n"],
            [""],
            ["+"],
            ["/"],
            [""],
        ];
    }
}
