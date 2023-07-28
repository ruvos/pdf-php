<?php

namespace PdfPhp\Pdf\Adapter\Adapter;


use Fpdf\Fpdf;

class FpdfAdapter implements PdfAdapterInterface
{
    private Fpdf $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf();
    }

    public function buildPdf($document): Fpdf
    {
        return $this->fpdf;
    }
}