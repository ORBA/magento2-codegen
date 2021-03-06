<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service;

use RecursiveDirectoryIterator;
use UnexpectedValueException;

class DirectoryIteratorFactory
{
    public function create(string $dir): RecursiveDirectoryIterator
    {
        try {
            $directoryIterator = new RecursiveDirectoryIterator($dir);
        } catch (UnexpectedValueException $e) {
            throw new UnexpectedValueException("Directory not found: " . $dir, 0, $e);
        }
        $directoryIterator->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        return $directoryIterator;
    }
}
