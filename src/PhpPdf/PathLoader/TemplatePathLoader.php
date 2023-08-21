<?php

declare(strict_types=1);

namespace PdfPhp\PathLoader;


final class TemplatePathLoader implements PathLoaderInterface
{

    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
