<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\Framework\Reflection\Test\Unit\Fixture\FQN;

/**
 * Sample class for tests.
 */
class SampleClass
{
    /**
     * @var SampleAttribute
     */
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
