<?php declare(strict_types=1);

namespace PdfPhp\Pdf\Element\ValueObject\Exception;

use Exception;

/**
 * @codeCoverageIgnore
 * @infection-ignore-all
 */
class StringRuleException extends Exception
{
    public const NOT_VALID_CHARACTER = 'The given string is not between a-z: %s';

    public static function notBetweenAtoZ($value): self
    {
        return new self(sprintf(self::NOT_VALID_CHARACTER, (string)$value));
    }
}