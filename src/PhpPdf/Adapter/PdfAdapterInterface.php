<?php

namespace PdfPhp\Pdf\Adapter\Adapter;

use PdfPhp\Pdf\Document;

interface PdfAdapterInterface
{
    public function buildPdf(Document $document);
}