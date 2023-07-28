<?php

namespace PdfPhp\Converter;

use Fpdf\Fpdf;
use PdfPhp\Pdf\Document;
use PdfPhp\Pdf\Element\PdfElement;
use PdfPhp\Pdf\Page;

class DocumentToPdfConverter
{
    private Document $document;

    private Fpdf $fpdf;

    public function __construct(Document $document)
    {
        $this->document = $document;
        $this->fpdf = new Fpdf();
    }

    public function buildPdf()
    {
        $document = $this->document;
        $this->fpdf->SetAuthor($document->author);
        //TODO: font dem document hinzufügen und dynamisch machen
        $this->fpdf->SetFont('Times');
        /** @var Page $page */
//        var_dump($document->pages);
        var_dump($document);
        die();
        foreach ($document->pages as $page) {
            $this->fpdf->AddPage();
            /** @var PdfElement $element */
            var_dump($page);
            foreach ($page->elements as $element) {
                $this->fpdf->SetY($element->getYCellPosition(), false);
                $this->fpdf->SetX($element->getXCellPosition());
                $this->fpdf->Cell($element->getCellWidth(), $element->getCellHeight(), $element->getValue(), 0, 0, '', true);
            }
        }
        $this->fpdf->Output('F', 'nice.pdf');
    }
}