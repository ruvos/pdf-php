<?php

namespace PdfPhp\Tests\Unit\Serializer;

use PdfPhp\Pdf\Document;
use PdfPhp\Converter\JsonDocumentConverter;
use PHPUnit\Framework\TestCase;

class JsonToDocumentConverterTest extends TestCase
{
    public function testJsonToDocumentIsValid()
    {
        $json = '{"author":"TestAuthor","pages":[]}';

        $converter = new JsonDocumentConverter();

        $document = $converter->jsonToDocument($json);

        $this->assertEquals('TestAuthor', $document->author);
    }

    public function testDocumentToJsonIsValid()
    {
        $document = new Document('TestAuthor');

        $converter = new JsonDocumentConverter();

        $jsonDocument = $converter->documentToJson($document);

        $this->assertEquals('{"author":"TestAuthor","pages":[]}', $jsonDocument);

    }
}