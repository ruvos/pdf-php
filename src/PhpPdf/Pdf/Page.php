<?php

namespace PdfPhp\Pdf;

class Page
{
    public readonly array $elements;

    public int $pageNumber;

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }
}