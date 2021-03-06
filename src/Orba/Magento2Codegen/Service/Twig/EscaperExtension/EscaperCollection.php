<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\Twig\EscaperExtension;

class EscaperCollection
{
    /**
     * @var EscaperInterface[]
     */
    private array $escapers;

    /**
     * @param EscaperInterface[] $escapers
     */
    public function __construct(array $escapers = [])
    {
        $this->escapers = $escapers;
    }

    /**
     * @return EscaperInterface[]
     */
    public function getItems(): array
    {
        return $this->escapers;
    }
}
