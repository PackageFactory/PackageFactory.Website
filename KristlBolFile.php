<?php declare(strict_types=1);
require_once 'vendor/autoload.php';

use PackageFactory\KristlBol\Application\KristlBolFile;
use PackageFactory\KristlBol\Domain\Document;
use PackageFactory\Website\Domain\WebPage\WebPageRepository;
use PackageFactory\Website\Presentation\Document\DocumentFactory;
use Psr\Http\Message\UriInterface;

return new class extends KristlBolFile 
{
    public function documents(): \Iterator
    {
        $webPageRepository = new WebPageRepository();
        $documentFactory = new DocumentFactory();

        $homepage = $webPageRepository->findHomePage();
        $document = $documentFactory->forHomePage($homepage);

        yield $document->getPath() => $document;
    }

    public function document(UriInterface $uri): ?Document
    {
        $webPageRepository = new WebPageRepository();
        $documentFactory = new DocumentFactory();

        switch (true) {
            case $uri->getPath() === '/':
            case $uri->getPath() === '/index.html':
                $homepage = $webPageRepository->findHomePage();
                return $documentFactory->forHomePage($homepage);
            default: return null;
        }
    }
};