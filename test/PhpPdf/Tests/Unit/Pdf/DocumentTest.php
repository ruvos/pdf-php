<?php

namespace PdfPhp\Tests\Unit\Pdf;

use PdfPhp\Pdf\Document;
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

        $document = new Document($expectedAuthorName, $pages);

        $this->assertEquals(2, count($document->pages));
        $this->assertEquals(1, $document->pages[0]->pageNumber);
        $this->assertEquals(2, $document->pages[1]->pageNumber);
    }
}