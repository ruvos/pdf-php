<?php

namespace PdfPhp\Pdf;

class Document
{
    public readonly string $author;

    public array $pages;

    public const FIRST_PAGE = 1;
    public function __construct($author, $pages = [])
    {
        $this->author = $author;
        $this->setPages($pages);
    }

    private function setPages(array $pages): void
    {
        $counter = self::FIRST_PAGE;
        $pageArray = [];

        /** @var Page $page */
        foreach ($pages as $page) {
            $page->pageNumber = $counter;
            $pageArray[] = $page;
            $counter++;
        }

        $this->pages = $pageArray;
    }
}