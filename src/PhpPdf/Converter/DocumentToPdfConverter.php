<?php

namespace PdfPhp\Converter;

use Fpdf\Fpdf;
use PdfPhp\Pdf\Document;
use PdfPhp\Pdf\Element\AbstractElement;
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
        foreach ($document->pages as $page) {
            $this->fpdf->AddPage();
            /** @var PdfElement $element */
            foreach ($page->elements as $element) {
//                $this->fpdf->Cell($element->getWidth(), $element->getWidth(), $element->getValue());
                $this->fpdf->Text($element->getWidth(), $element->getWidth(), $element->getValue());
            }
        }
        $this->fpdf->Output('F', 'nice.pdf');
    }
}