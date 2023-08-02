<?php declare(strict_types=1);

namespace PdfPhp\Converter;

use PdfPhp\Pdf\Document;
use PdfPhp\Pdf\Element\TextElement;
use PdfPhp\Pdf\Page;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class JsonDocumentConverter
{
    private SerializerInterface $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function jsonToDocument(string $jsonDocument): Document
    {
        $pdfArray = json_decode($jsonDocument,true);
        $document = $this->buildPdf($pdfArray);
        return $document;
    }

    public function documentToJson(Document $document): string
    {
        $document = $this->serializer->serialize($document, 'json');

        return $document;
    }

    private function buildPdf(array $pdfArray): Document
    {
        $pages = [];
        foreach ($pdfArray['pages'] as $page) {
            $elements = [];
            foreach ($page['elements'] as $element) {
                $value = null;

                if(isset($element['value'])) {
                   $value = $element['value'];
                }
                $elements[] = new TextElement($element['xCellPosition'],$element['yCellPosition'],$value,$element['elementName'],$element['cellWidth'],$element['cellHeight']);
            }
            $pages[] = new Page($elements);
        }
        return new Document($pdfArray['author'],$pdfArray['filename'],$pages);
    }
}