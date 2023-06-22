<?php

namespace PdfPhp\Pdf\Element;

use PdfPhp\Pdf\Element\ValueObject\ValueObjectInterface;

class AbstractElement implements PdfElement
{
    private int $width;

    private int $height;

    private ValueObjectInterface $valueObject;

    public function __construct(int $width, int $height, ValueObjectInterface $valueObject)
    {
        $this->width = $width;
        $this->height = $height;
        $this->valueObject = $valueObject;
    }

    public function getValue()
    {
        return $this->valueObject->getValue();
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }
}