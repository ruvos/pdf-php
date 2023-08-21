<?php

declare(strict_types=1);

namespace PdfPhp\Converter;

use PdfPhp\Pdf\Document;

interface DocumentToPdfConverterInterface
{
    public function buildPdfTemplate(Document $document, string $output);
}