<?php

namespace PdfPhp\Pdf\Element\ValueObject\Rule;

use PdfPhp\Pdf\Element\ValueObject\Exception\IntegerRuleException;

class IntegerRule extends AbstractRule
{
    public const POSITIVE_NUMBER_CONSTRAINT = '/^[0-9]*$/';
    public function isValid(): bool
    {
        return 1 === preg_match(self::POSITIVE_NUMBER_CONSTRAINT, $this->value);
    }

    public function getException(): \Throwable
    {
        return IntegerRuleException::notAnInteger($this->value);
    }
}