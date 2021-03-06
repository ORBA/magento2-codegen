<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\StringFunction;

use Orba\Magento2Codegen\Service\StringFunction\Helper\DatabaseType;

class DatabaseTypeToPHPFunction implements FunctionInterface
{
    private DatabaseType $databaseTypeHelper;

    public function __construct(DatabaseType $databaseTypeHelper)
    {
        $this->databaseTypeHelper = $databaseTypeHelper;
    }

    public function execute(...$args): ?string
    {
        return $this->databaseTypeToPHP(...$args);
    }

    private function databaseTypeToPHP(string $databaseType): string
    {
        $this->databaseTypeHelper->validate($databaseType);
        $databaseType = $this->databaseTypeHelper->normalize($databaseType);
        switch ($databaseType) {
            case 'int':
            case 'smallint':
                return 'int';
            case 'boolean':
                return 'bool';
            case 'decimal':
            case 'float':
            case 'real':
                return 'float';
            default:
                return 'string';
        }
    }
}
