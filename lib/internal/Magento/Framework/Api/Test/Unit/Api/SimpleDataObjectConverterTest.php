<?php

declare(strict_types=1);

namespace Magento\Framework\Api\Test\Unit\Api;

use Magento\Framework\Api\SimpleDataObjectConverter;
use PHPUnit\Framework\TestCase;

class SimpleDataObjectConverterTest extends TestCase
{
    /**
     * @dataProvider camelCaseToSnakeCaseStubsValues
     */
    public function testCamelCaseToSnakeCaseWithSimpleRegularValue(string $input, string $result): void
    {
        self::assertEquals($result, SimpleDataObjectConverter::camelCaseToSnakeCase($input));
    }

    public function camelCaseToSnakeCaseStubsValues(): array
    {
        return [
            ['value' => 'groupId', 'result' => 'group_id'],
            ['value' => 'anotherValueInCamelCase', 'result' => 'another_value_in_camel_case'],
            ['value' => 'createdAt', 'result' => 'created_at'],
            ['value' => 'getRelevantBillingCodes', 'result' => 'get_relevant_billing_codes'],
            ['value' => 'UPPERVALUE', 'result' => 'u_p_p_e_r_v_a_l_u_e']
        ];
    }


}
