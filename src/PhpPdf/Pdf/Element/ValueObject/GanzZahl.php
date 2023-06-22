<?php declare(strict_types=1);

namespace PdfPhp\Pdf\Element\ValueObject;

use PdfPhp\Pdf\Element\ValueObject\Rule\IntegerRule;
use PdfPhp\Pdf\Element\ValueObject\Validator\Validator;

class GanzZahl extends AbstractValueObject
{
    public function __construct($value)
    {
        $this->validator = new Validator();
        $this->validator->addRule(new IntegerRule($value));
        parent::__construct($value);
    }
}