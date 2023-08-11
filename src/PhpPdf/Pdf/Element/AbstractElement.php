<?php

namespace PdfPhp\Pdf\Element;

class AbstractElement implements PdfElement
{
    public int $cellWidth;

    public int $cellHeight;

    public int $xCellPosition;

    public int $yCellPosition;

    public string $elementName;

    public string|null $value;

    public function __construct(int $xposition, int $yposition, string|null $value, string $elementName = 'element', int $cellWidth = 0, int $cellHeight = 0)
    {
        $this->cellWidth = $cellWidth;
        $this->cellHeight = $cellHeight;
        $this->value = $value;
        $this->xCellPosition = $xposition;
        $this->yCellPosition = $yposition;
        $this->elementName = $elementName;
    }

    public function getValue(): string|null
    {
        return $this->value;
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