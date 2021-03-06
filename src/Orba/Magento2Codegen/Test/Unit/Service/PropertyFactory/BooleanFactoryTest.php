<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Test\Unit\Service\PropertyFactory;

use Orba\Magento2Codegen\Model\BooleanProperty;
use Orba\Magento2Codegen\Service\PropertyBuilder;
use Orba\Magento2Codegen\Service\PropertyFactory\BooleanFactory;
use Orba\Magento2Codegen\Service\StringValidator;
use Orba\Magento2Codegen\Test\Unit\TestCase;

class BooleanFactoryTest extends TestCase
{
    private BooleanFactory $booleanFactory;

    public function setUp(): void
    {
        $this->booleanFactory = new BooleanFactory(new PropertyBuilder());
    }

    public function testCreateReturnsBooleanProperty(): void
    {
        $result = $this->booleanFactory->create('name', []);
        $this->assertInstanceOf(BooleanProperty::class, $result);
    }
}
