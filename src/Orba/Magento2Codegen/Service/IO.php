<?php

/**
 * @copyright Copyright © 2021 Orba. All rights reserved.
 * @author    info@orba.co
 */

declare(strict_types=1);

namespace Orba\Magento2Codegen\Service;

use RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class IO
{
    private bool $initialized = false;
    private SymfonyStyle $instance;
    private InputInterface $input;
    private OutputInterface $output;

    public function init(InputInterface $input, OutputInterface $output): void
    {
        if ($this->initialized) {
            throw new RuntimeException('IO object was already initialized.');
        }
        $this->input = $input;
        $this->output = $output;
        $this->instance = new SymfonyStyle($input, $output);
        $this->initialized = true;
    }

    public function getInstance(): SymfonyStyle
    {
        $this->validateInitialization();
        return $this->instance;
    }

    public function getInput(): InputInterface
    {
        $this->validateInitialization();
        return $this->input;
    }

    public function getOutput(): OutputInterface
    {
        $this->validateInitialization();
        return $this->output;
    }

    private function validateInitialization(): void
    {
        if (!$this->initialized) {
            throw new RuntimeException('IO object must be initialized before using it.');
        }
    }
}
