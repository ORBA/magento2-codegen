<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\FileMerger;

use Orba\Magento2Codegen\Service\FileMerger\CsvI18nMerger\Processor;

class CsvI18nMerger extends AbstractMerger implements MergerInterface
{
    private Processor $processor;

    public function __construct(Processor $processor)
    {
        $this->processor = $processor;
    }

    public function merge(string $oldContent, string $newContent): string
    {
        return $this->processor->generateContent($this->processor->merge($oldContent, $newContent));
    }
}
