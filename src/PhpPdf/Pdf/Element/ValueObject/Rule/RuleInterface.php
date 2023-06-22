<?php

namespace PdfPhp\Pdf\Element\ValueObject\Rule;

/**
 * @codeCoverageIgnore
 */
interface RuleInterface
{
    public function isValid(): bool;

    public function getException(): \Throwable;
}