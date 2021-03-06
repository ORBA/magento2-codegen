<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Test\Unit\Service;

use Orba\Magento2Codegen\Service\FileMerger\MergerInterface;
use Orba\Magento2Codegen\Service\FileMergerFactory;
use Orba\Magento2Codegen\Test\Unit\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class FileMergerFactoryTest extends TestCase
{
    private FileMergerFactory $fileMergerFactory;

    public function setUp(): void
    {
        $this->fileMergerFactory = new FileMergerFactory();
    }

    public function testCreateReturnsNullIfMergerNotFound(): void
    {
        $result = $this->fileMergerFactory->create('file.xml');
        $this->assertNull($result);
    }

    public function testCreateReturnsMergerIfFilenameMatchesPattern(): void
    {
        /** @var MockObject|MergerInterface $mergerMock */
        $mergerMock = $this->getMockBuilder(MergerInterface::class)->getMockForAbstractClass();
        $this->fileMergerFactory->addMerger('/^.*\.xml/', $mergerMock);
        $result = $this->fileMergerFactory->create('file.xml');
        $this->assertSame($result, $mergerMock);
    }
}
