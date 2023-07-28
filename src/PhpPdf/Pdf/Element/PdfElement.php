<?php

namespace PdfPhp\Pdf\Element;

interface PdfElement
{
    public function getValue();

    public function getCellHeight(): int;

    public function getCellWidth(): int;

    public function getXCellPosition(): int;
    public function getYCellPosition(): int;
}