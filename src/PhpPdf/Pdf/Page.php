<?php

namespace PdfPhp\Pdf;

use PdfPhp\Pdf\Element\AbstractElement;

class Page
{
    /**
     * @var array<AbstractElement>
     */
    public readonly array $elements;

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }
}