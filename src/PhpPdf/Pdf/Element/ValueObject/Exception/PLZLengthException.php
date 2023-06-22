<?php

namespace PdfPhp\Pdf\Element\ValueObject\Exception;

/**
 * @codeCoverageIgnore
 * @infection-ignore-all
 */
class PLZLengthException extends \Exception
{
    public const NOT_VALID_LENGTH = 'The given string is not 5 characters long: %s';

    public static function notPLZLength($value): self
    {
        return new self(sprintf(self::NOT_VALID_LENGTH, (string)$value));
    }
}