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
    public function testDocumentToPdfIsSavedLocally()
    {

        $element1 = new TextElement(12,23,new Text('TextEins'));
        $element2 = new TextElement(12,23,new Text('TextZwei'));
        $page = new Page([$element1, $element2]);
        $document = new Document('Ruwen Katschek', [$page]);
        $pdfConverter = new DocumentToPdfConverter($document);


        $pdfConverter->buildPdf();
    }
}