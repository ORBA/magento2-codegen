<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Model;

abstract class AbstractProperty implements PropertyInterface
{
    protected ?string $name = null;
    protected ?string $description = null;

    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setDescription(string $value): self
    {
        $this->description = $value;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }
}
