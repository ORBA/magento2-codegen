<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Test\Unit\Service\PropertyFactory;

use Orba\Magento2Codegen\Model\StringProperty;
use Orba\Magento2Codegen\Service\PropertyBuilder;
use Orba\Magento2Codegen\Service\PropertyFactory\StringFactory;
use Orba\Magento2Codegen\Service\PropertyStringValidatorsAdder;
use Orba\Magento2Codegen\Test\Unit\TestCase;
use Orba\Magento2Codegen\Service\StringValidator;

class StringFactoryTest extends TestCase
{
    private StringFactory $stringFactory;

    public function setUp(): void
    {
        $validatorsAdderMock = $this->createPartialMock(PropertyStringValidatorsAdder::class, []);
        $this->stringFactory = new StringFactory(new PropertyBuilder(), $validatorsAdderMock);
    }

    public function testCreateReturnsStringProperty(): void
    {
        $result = $this->stringFactory->create('name', []);
        $this->assertInstanceOf(StringProperty::class, $result);
    }
}
