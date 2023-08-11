<?php

namespace PdfPhp\Tests\Unit\Pdf;

use PdfPhp\Pdf\Document;
use PdfPhp\Pdf\Element\TextElement;
use PdfPhp\Pdf\Page;
use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase
{
    public function testDocumentCreationIsValid()
    {
        $expectedAuthorname = 'testAuthor';
        $document = new Document($expectedAuthorname);

        $this->assertEquals($expectedAuthorname, $document->author);
    }

    public function testDocumentWithPagesIsInstantiatedCorrectly()
    {
        $expectedAuthorName = 'testAuthor';
        $pages = [new Page(), new Page()];
        $document = new Document($expectedAuthorName,'file.pdf', $pages);

        $this->assertEquals(2, count($document->pages));
    }

    public function testCreateKeyValueCreationArrayIsValid()
    {
        $expectedAuthorName = 'testAuthor';
        $elements = [new TextElement(23,23,null, 'niceElement')];
        $pages = [new Page($elements)];
        $document = new Document($expectedAuthorName,'file.pdf', $pages);

        $expectedValueList = ['name' => 'file.pdf', 'niceElement' => ''];

        $this->assertEquals($expectedValueList, $document->createKeyValueCreationArray($document));
    }

    public function testCreateEmptyValueDocumentIsValid()
    {
        $expectedAuthorName = 'testAuthor';
        $elements = [new TextElement(23,23,null, 'niceElement'), new TextElement(24,24,'wertDerNichtImEmptyDocumentAuftauchenDarf', 'niceElement1')];
        $pages = [new Page($elements)];
        $document = new Document($expectedAuthorName,'file.pdf', $pages);

        $expectedElements = [new TextElement(23,23,null, 'niceElement')];
        $expectedPages = [new Page($expectedElements)];
        $expectedDocument = new Document($expectedAuthorName,'file.pdf', $expectedPages);

        $this->assertEquals($expectedDocument, $document->createEmptyValueDocument());
    }

    public function testFillDocumentWithValuesIsValid()
    {
        $expectedAuthorName = 'testAuthor';
        $elements = [new TextElement(23,23,null, 'niceElement')];
        $pages = [new Page($elements)];
        $document = new Document($expectedAuthorName,'file.pdf', $pages);

        $givenValueList = ['niceElement' => "23"];

        $expectedElements = [new TextElement(23,23,23, 'niceElement')];
        $expectedPages = [new Page($expectedElements)];
        $expectedDocument = new Document($expectedAuthorName,'file.pdf', $expectedPages);

        $document->fillDocumentWithValues($givenValueList);

        $this->assertEquals($expectedDocument, $document);
    }
}