<?php

namespace PdfPhp\Converter;

use PdfPhp\PathLoader\PathLoaderInterface;
use PdfPhp\Pdf\Document;
use PdfPhp\Pdf\Element\PdfElement;
use PdfPhp\Pdf\Page;
use setasign\Fpdi\Fpdi;

class DocumentToPdfConverter implements DocumentToPdfConverterInterface
{
    private Fpdi $fpdf;
    private PathLoaderInterface $pathLoader;


    public function __construct(PathLoaderInterface $pathLoader)
    {
        $this->fpdf = new Fpdi();
        $this->pathLoader = $pathLoader;
    }

    public function buildPdfTemplate(Document $document, string $output = 'F')
    {
        $this->fpdf->SetAuthor($document->author);
        //TODO: font dem document hinzufügen und dynamisch machen
        $this->fpdf->SetFont('Times');
        /** @var Page $page */
        foreach ($document->pages as $page) {
            $this->fpdf->AddPage();
            /** @var PdfElement $element */
            foreach ($page->elements as $element) {
                $this->fpdf->SetY($element->getYCellPosition(), false);
                $this->fpdf->SetX($element->getXCellPosition());
                $this->fpdf->Cell($element->getCellWidth(), $element->getCellHeight(), $element->getValue(), 0, 0, '');
            }
        }

        if (file_exists($this->pathLoader->getPath().$document->filename) && $output === 'D') {
            $this->fpdf->setSourceFile($this->pathLoader->getPath().$document->filename);
            $asd = $this->fpdf->importPage(1);
            $this->fpdf->useTemplate($asd);
            $this->fpdf->Output($output, 'finish_'.$document->filename);
            die();
        }
        //TODO:: templates pfad über env definieren. Loader klasse dafür bauen
        $this->fpdf->Output($output, $this->pathLoader->getPath().$document->filename);
    }
}