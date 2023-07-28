<?php declare(strict_types=1);

namespace PdfPhp\Pdf;

final class Document
{
    public readonly string $author;

    public readonly string $filename;

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
}