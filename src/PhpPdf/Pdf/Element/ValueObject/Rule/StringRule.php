<?php

namespace PdfPhp\Pdf\Element\ValueObject\Rule;

use PdfPhp\Pdf\Element\ValueObject\Exception\StringRuleException;

class StringRule extends AbstractRule
{
    public const ALPHABET_LETTER_CONSTRAINT = '/^[a-zA-Z]*$/';
    public function isValid(): bool
    {
        return 1 === preg_match(self::ALPHABET_LETTER_CONSTRAINT, $this->value);
    }

    public function getException(): \Throwable
    {
        return StringRuleException::notBetweenAtoZ($this->value);
    }
}