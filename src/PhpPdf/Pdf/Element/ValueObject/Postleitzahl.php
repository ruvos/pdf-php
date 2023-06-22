<?php

namespace PdfPhp\Pdf\Element\ValueObject;

use PdfPhp\Pdf\Element\ValueObject\Rule\IntegerRule;
use PdfPhp\Pdf\Element\ValueObject\Rule\PLZLengthRule;
use PdfPhp\Pdf\Element\ValueObject\Validator\Validator;

class Postleitzahl extends AbstractValueObject
{
 public function __construct($value)
 {
     $this->validator = new Validator();
     $this->validator->addRule(new IntegerRule($value));
     $this->validator->addRule(new PLZLengthRule($value));
     parent::__construct($value);
 }
}