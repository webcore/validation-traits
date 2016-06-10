<?php
namespace Webcore\Validation\Tests\Rules;

use Webcore\Validation\Rules\EmailTrait;
use Webcore\Validation\Tests\SingleParamsTraitTest;

class EmailTraitTest extends SingleParamsTraitTest
{
    protected function getTestTraitName()
    {
        return EmailTrait::class;
    }

    protected function getTestMethodName()
    {
        return "validateEmail";
    }

    public function provideInvalidValues()
    {
        return [
            ["10.255.255.255.122"],
            ["10.255.255"],
            ["10.255.255.aaa"],
            ["1.2"],
            ["-10.1"],
            ["1.2e3"],
            ["7E-10"],
            ["-100023"],
            ["new \\stdClass()"],
            ["array()"],
            ["...!@#$%^&*()){}|<>?!"],
            ["TG9yZW0gSXBzdW0gamUgZmlrdMOtdm55IHRleHQsIHBvdcW+w612YW7DvSBwcmkgbsOhdnJodSB0bGHEjW92w61uIGEgdHlwb2dyYWZpZS4gTG9yZW0gSXBzdW0gamUgxaF0YW5kYXJkbsO9bSB2w71wbMWIb3bDvW0gdGV4dG9tIHXFviBvZCAxNi4gc3Rvcm/EjWlhLCBrZcSPIG5lem7DoW15IHRsYcSNaWFyIHpvYnJhbCBzYWR6b2JuaWN1IHBsbsO6IHRsYcSNb3bDvWNoIHpuYWtvdiBhIHBvbWllxaFhbCBpY2gsIGFieSB0YWsgdnl0dm9yaWwgdnpvcmtvdsO6IGtuaWh1LiBQcmXFvmlsIG5pZWxlbiBww6TFpSBz"],
            ["bG9yZW0="],
            ["MA=="],
            ["\n\n\n"],
            ["0.0.0.0"],
            ["255.255.255.255"],
            ["192.168.0.1"],
            ["2001:0db8:85a3:08d3:1319:8a2e:0370:7334"],
            ["2001:0db8:85a3:08d3::"],
        ];
    }

    public function provideValidValues()
    {
        return [
            ["bob@example.com"],
            ["john.doe@example.com"],
            ["john.doe+example@example.com"],
        ];
    }
}
