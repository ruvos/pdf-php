<?php

namespace PdfPhp\Pdf\Element\ValueObject\Rule;

use PdfPhp\Pdf\Element\ValueObject\Exception\PLZLengthException;

class PLZLengthRule extends AbstractRule
{
    public const PLZ_LENGTH_RULE = 5;

    public function isValid(): bool
    {
        return self::PLZ_LENGTH_RULE === strlen($this->value);
    }

    public function getException(): \Throwable
    {
        return PLZLengthException::notPLZLength($this->value);
    }
}