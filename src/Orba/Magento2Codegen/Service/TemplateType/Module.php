<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service\TemplateType;

use Orba\Magento2Codegen\Model\Template;
use Orba\Magento2Codegen\Service\CommandUtil\Module as CommandUtil;
use Orba\Magento2Codegen\Service\TemplateFactory;
use Orba\Magento2Codegen\Util\PropertyBag;
use RuntimeException;

use function is_null;

class Module implements TypeInterface
{
    public const MODULE_TEMPLATE_NAME = 'module';

    private CommandUtil $commandUtil;
    private ?TemplateFactory $templateFactory = null;

    public function __construct(CommandUtil $commandUtil)
    {
        $this->commandUtil = $commandUtil;
    }

    public function beforeGenerationCommand(Template $template): bool
    {
        if (is_null($this->templateFactory)) {
            throw new RuntimeException('Template factory must be set.');
        }
        if ($this->commandUtil->shouldCreateModule()) {
            $this->commandUtil->createModule($this->templateFactory);
        }
        return true;
    }

    public function getBasePropertyBag(): PropertyBag
    {
        return $this->commandUtil->getPropertyBag();
    }

    public function setTemplateFactory(TemplateFactory $templateFactory): void
    {
        $this->templateFactory = $templateFactory;
    }
}
