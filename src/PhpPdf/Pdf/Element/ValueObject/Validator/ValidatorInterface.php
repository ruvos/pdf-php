<?php

namespace PdfPhp\Pdf\Element\ValueObject\Validator;

use PdfPhp\Pdf\Element\ValueObject\Rule\RuleInterface;

/**
 * @codeCoverageIgnore
 */
interface ValidatorInterface
{
    public function addRule(RuleInterface $rule): void;

    public function validate($value);
}