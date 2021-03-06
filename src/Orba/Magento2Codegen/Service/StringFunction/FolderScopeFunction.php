<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\StringFunction;

use function in_array;

class FolderScopeFunction implements FunctionInterface
{
    public function execute(...$args): ?string
    {
        return $this->folderScope(...$args);
    }

    private function folderScope(string $scope): string
    {
        if (in_array($scope, ['frontend', 'adminhtml'])) {
            return '/' . $scope;
        }
        return '';
    }
}
