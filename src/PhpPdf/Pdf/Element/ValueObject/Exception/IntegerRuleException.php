<?php

namespace PdfPhp\Pdf\Element\ValueObject\Exception;

/**
 * @codeCoverageIgnore
 * @infection-ignore-all
 */
class IntegerRuleException extends \Exception
{
    public const NOT_VALID_INTEGER = 'This value is not an Integer: %s';

    public static function notAnInteger($value): self
    {
        return new self(sprintf(self::NOT_VALID_INTEGER,(string)$value));
    }
}