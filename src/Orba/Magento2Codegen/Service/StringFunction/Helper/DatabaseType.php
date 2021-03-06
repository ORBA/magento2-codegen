<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\StringFunction\Helper;

use InvalidArgumentException;

use function implode;
use function in_array;
use function strtolower;

class DatabaseType
{
    public const INT_TYPES = ['int', 'smallint', 'bigint', 'tinyint', 'timestamp'];
    public const DECIMAL_TYPES = ['decimal', 'float', 'double'];
    public const STRING_TYPES = ['varbinary', 'varchar'];
    public const ALLOWED_TYPES = ['bigint', 'blob', 'boolean', 'date', 'datetime',
        'decimal', 'double', 'float', 'int', 'smallint', 'text', 'timestamp', 'tinyint',
        'varbinary', 'varchar'];

    public function normalize(string $databaseType): string
    {
        return strtolower($databaseType);
    }

    public function validate(string $databaseType): void
    {
        if (!in_array($databaseType, self::ALLOWED_TYPES)) {
            throw new InvalidArgumentException('Wrong database type: ' . $databaseType
                . ' Allowed types: ' . implode(",", self::ALLOWED_TYPES));
        }
    }
}
