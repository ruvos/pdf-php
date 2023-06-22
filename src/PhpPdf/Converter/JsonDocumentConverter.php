<?php declare(strict_types=1);

namespace PdfPhp\Converter;

use PdfPhp\Pdf\Document;
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
        $document = $this->serializer->deserialize($jsonDocument, Document::class, 'json');

        return $document;
    }

    public function documentToJson(Document $document): string
    {
        $document = $this->serializer->serialize($document, 'json');

        return $document;
    }
}