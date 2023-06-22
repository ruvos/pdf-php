<?php

namespace PdfPhp\Pdf\Element\ValueObject\Rule;

abstract class AbstractRule implements RuleInterface
{
    protected $value;
    public function __construct($value)
    {
        $this->value = $value;
    }
}