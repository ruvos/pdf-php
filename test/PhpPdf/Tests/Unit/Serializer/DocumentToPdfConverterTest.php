<?php declare(strict_types=1);

namespace PdfPhp\Tests\Unit\Serializer;

use PdfPhp\Converter\DocumentToPdfConverter;
use PdfPhp\Pdf\Document;
use PdfPhp\Pdf\Element\TextElement;
use PdfPhp\Pdf\Element\ValueObject\Text;
use PdfPhp\Pdf\Page;
use PHPUnit\Framework\TestCase;

class DocumentToPdfConverterTest extends TestCase
{
    public function testDocumentToPdfIsSavedLocally(): void
    {
        $element1 = new TextElement(0, 0, new Text('TextEins'), 'Erster Text', 20, 40);
        $element2 = new TextElement(30, 30, new Text('TextZwei'), 'Zweiter Text', 12, 13);
        $page = new Page([$element1, $element2]);
        $document = new Document('Ruwen Katschek','test.pdf', [$page]);
        $pdfConverter = new DocumentToPdfConverter($document);


        $pdfConverter->buildPdf();
    }
}