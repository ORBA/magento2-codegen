<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service;

use InvalidArgumentException;
use Orba\Magento2Codegen\Model\PropertyInterface;
use Orba\Magento2Codegen\Service\PropertyFactory\FactoryInterface;

class PropertyFactory
{
    /**
     * @var FactoryInterface[]
     */
    private array $map;

    public function __construct(array $map = [])
    {
        $this->map = $map;
    }

    public function create(string $name, array $config): PropertyInterface
    {
        if (!isset($config['type'])) {
            throw new InvalidArgumentException('Property type not defined.');
        }
        if (!isset($this->map[$config['type']])) {
            throw new InvalidArgumentException('Invalid property type.');
        }
        return $this->map[$config['type']]->create($name, $config);
    }
}
