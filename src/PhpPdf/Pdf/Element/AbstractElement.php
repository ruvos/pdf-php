<?php

namespace PdfPhp\Pdf\Element;

use PdfPhp\Pdf\Element\ValueObject\ValueObjectInterface;

class AbstractElement implements PdfElement
{
    private int $cellWidth;

    private int $cellHeight;

    private int $xCellPosition;

    private int $yCellPosition;

    private string $elementName;

    private ValueObjectInterface $valueObject;

    public function __construct(int $xposition, int $yposition, ValueObjectInterface $valueObject,string $elementName = 'element',int $cellWidth = 0, int $cellHeight = 0)
    {
        $this->cellWidth = $cellWidth;
        $this->cellHeight = $cellHeight;
        $this->valueObject = $valueObject;
        $this->xCellPosition = $xposition;
        $this->yCellPosition = $yposition;
        $this->elementName = $elementName;
    }

    public function getValue()
    {
        return $this->valueObject->getValue();
    }

    public function getCellWidth(): int
    {
        return $this->cellWidth;
    }

    public function getCellHeight(): int
    {
        return $this->cellHeight;
    }

    public function getXCellPosition(): int
    {
        return $this->xCellPosition;
    }

    public function getYCellPosition(): int
    {
        return $this->yCellPosition;
    }

    public function getElementName(): string
    {
        return $this->elementName;
    }
}