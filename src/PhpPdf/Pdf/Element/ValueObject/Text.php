<?php

namespace PdfPhp\Pdf\Element\ValueObject;

use PdfPhp\Pdf\Element\ValueObject\Rule\StringRule;
use PdfPhp\Pdf\Element\ValueObject\Validator\Validator;

class Text extends AbstractValueObject
{
    public function __construct($value)
    {
        $this->validator = new Validator();
        $this->validator->addRule(new StringRule($value));
        parent::__construct($value);
    }
}