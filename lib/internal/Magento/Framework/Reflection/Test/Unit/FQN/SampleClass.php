<?php

declare(strict_types=1);

namespace Magento\Framework\Reflection\Test\Unit\Fixture\FQN;

class SampleClass
{
    private SampleAttribute $attribute;

    /**
     * @return SampleAttribute
     */
    public function getAttribute(): SampleAttribute
    {
        return $this->attribute;
    }

    /**
     * @param SampleAttribute $attribute
     */
    public function setAttribute(SampleAttribute $attribute): void
    {
        $this->attribute = $attribute;
    }
}
