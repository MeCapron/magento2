<?php

declare(strict_types=1);

namespace Magento\Framework\Reflection\Test\Unit;

use Magento\Framework\Reflection\SettersFields;
use PHPUnit\Framework\TestCase;

class SetterFieldsTest extends TestCase
{
    private ?SettersFields $settersFields = null;

    protected function setUp(): void
    {
        $this->settersFields = new SettersFields();
    }

    public function testGetSettersFieldsClassWithClassicMethods(): void
    {
        $stubClass = new class() {
            public function getMyMethod(): void { }
            public function setMyMethod(): void { }
            public function getBlank(): void { }
            public function setBlank(): void { }
        };

        $result = $this->settersFields->get($stubClass);

        self::assertCount(2, $result);
        self::assertEqualsCanonicalizing(['my_method', 'blank'], array_keys($result));
    }

    public function testGetSettersFieldsClassWithNonClassicMethodsUppercase(): void
    {
        $stubClass = new class() {
            public function getMyMethod(): void { }
            public function setMyMethod(): void { }
            public function getBlank(): void { }
            public function setBlank(): void { }
            public function getTYPESOFFER(): void { }
            public function setTYPESOFFER(): void { }
        };

        $result = $this->settersFields->get($stubClass);

        self::assertCount(3, $result);
        self::assertEqualsCanonicalizing(['my_method', 'blank', 't_y_p_e_s_o_f_f_e_r'], array_keys($result));
    }
}
