<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Model;

abstract class AbstractInputProperty extends AbstractProperty implements InputPropertyInterface
{
    /**
     * @var mixed
     */
    protected $defaultValue = null;

    protected bool $required = false;
    protected array $depend = [];

    public function getDefaultValue()
    {
        return $this->defaultValue;
    }

    public function setDefaultValue($value): self
    {
        $this->defaultValue = $value;
        return $this;
    }

    public function getRequired(): bool
    {
        return $this->required;
    }

    public function setRequired(bool $value): self
    {
        $this->required = $value;
        return $this;
    }

    public function getDepend(): array
    {
        return $this->depend;
    }

    public function setDepend(array $value): self
    {
        $this->depend = $value;
        return $this;
    }
}
