<?php

namespace PdfPhp\Pdf\Element;

interface PdfElement
{
    public function getValue();

    public function getHeight(): int;

    public function getWidth(): int;
}