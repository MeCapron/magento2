<?php

declare(strict_types=1);

namespace Magento\Framework\Reflection;

use Magento\Framework\Api\SimpleDataObjectConverter;

use function get_class;

class SettersFields
{
    /**
     * @var string[][]
     */
    private array $settersCache = [];

    /**
     * @return string[]
     */
    public function get(object $dataObject): array
    {
        $class = get_class($dataObject);

        if (isset($this->settersCache[$class])) {
            return $this->settersCache[$class];
        }

        $dataObjectMethods = get_class_methods($class);
        // use regexp to manipulate with method list as it use jit starting with PHP 7.3
        $classSetters = preg_replace(
            ['/(^|,)(?!set)[^,]*/S'],
            ['', '$1_$2'],
            implode(',', $dataObjectMethods)
        );

        $snakeCaseClassSetters = SimpleDataObjectConverter::camelCaseToSnakeCase($classSetters);

        $normalizedFields = array_filter(explode(',', $snakeCaseClassSetters));
        $setters = preg_replace('/(^|,)set_/iS', '', $normalizedFields);

        $this->settersCache[$class] = array_flip($setters);

        return $this->settersCache[$class];
    }
}
