<?php declare(strict_types=1);

namespace PdfPhp\Pdf;

final class Document
{
    public readonly string $author;

    public readonly string $filename;

    public bool $isEmptyValueDocumentCreated = false;

    /**
     * @var array<Page>
     */
    public array $pages;

    public function __construct(string $author, string $filename = 'document.pdf', array $pages = [])
    {
        $this->author = $author;
        $this->filename = $filename;
        $this->pages = $pages;
    }

    public function createEmptyValueDocument()
    {
        $pages = [];

        foreach ($this->pages as $page) {
            $elements = [];
            foreach ($page->elements as $element) {
                if($element->value === null) {
                   $elements[] = $element;
                }
            }
            $pages[] = new Page($elements);
        }

        $this->isEmptyValueDocumentCreated = true;

        return new Document($this->author, $this->filename,$pages);
    }

    public function createKeyValueCreationArray(Document $document)
    {
        $list = ['name' => $document->filename];

        $pages = $document->pages;

        foreach ($pages as $page) {
            foreach ($page->elements as $element) {
                $list[$element->elementName] = '';
            }
        }

        return $list;
    }

    public function fillDocumentWithValues(array $keyValueList)
    {
        foreach ($this->pages as $page) {
            foreach ($page->elements as $element) {
                foreach ($keyValueList as $key => $value) {
                    if ($element->elementName === $key) {
                        $element->value = $value;
                    }
                }
            }
        }
    }
}