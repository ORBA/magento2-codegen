<?php

/**
 * @copyright Copyright © 2022 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\PropertyValueCollector\Yaml;

use InvalidArgumentException;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class DataProviderFactory
{
    /**
     * @SuppressWarnings(PHPMD.StaticAccess)
     */
    public function create(string $filePath): DataProvider
    {
        try {
            $data = Yaml::parseFile($filePath);
        } catch (ParseException $e) {
            throw new InvalidArgumentException('Unable to parse the following file: ' . $filePath);
        }
        return new DataProvider($data);
    }
}
