<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\FileMerger\PhpMerger\NodeTree\NodeCleaner;

use Orba\Magento2Codegen\Service\FileMerger\PhpMerger\NodeTree\NameResolver\NodeChainNameResolver;
use PhpParser\Node\Stmt\ClassMethod;

class ClassMethodNodeCleaner implements NodeCleanerInterface
{
    private NodeChainNameResolver $nameResolver;

    public function __construct(NodeChainNameResolver $nameResolver)
    {
        $this->nameResolver = $nameResolver;
    }

    public function getCode(): string
    {
        return ClassMethod::class;
    }

    public function clean(array $nodes): array
    {
        $result = [];
        foreach ($nodes as $node) {
            $name = $this->nameResolver->resolve($node);
            $result[$name] = $node;
        }
        return $result;
    }
}
