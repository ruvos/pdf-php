<?php

namespace PdfPhp\Pdf\Element\ValueObject;

use PdfPhp\Pdf\Element\ValueObject\Validator\ValidatorInterface;

abstract class AbstractValueObject implements ValueObjectInterface
{
    protected $value;

    protected ValidatorInterface $validator;

    public function __construct($value)
    {

        $this->validator->validate($value);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}