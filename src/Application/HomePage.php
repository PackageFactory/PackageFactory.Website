<?php declare(strict_types=1);
namespace PackageFactory\Website\Application;

use PackageFactory\KristlBol\Domain\Shared\ContentInterface;
use PackageFactory\KristlBol\Domain\Shared\Path;
use PackageFactory\KristlBol\Domain\Tree\FileInterface;
use PackageFactory\KristlBol\Infrastructure\Shared\Content\StringContent;
use PackageFactory\VirtualDOM\Rendering\HTML5DocumentStringRenderer;
use PackageFactory\Website\Domain\WebPage\WebPageRepository;
use PackageFactory\Website\Presentation\Document\DocumentFactory;

final class HomePage implements FileInterface
{
    /**
     * @var WebPageRepository
     */
    private $webPageRepository;

    /**
     * @var DocumentFactory
     */
    private $documentFactory;

    /**
     * @param null|WebPageRepository $webPageRepository
     * @param null|DocumentFactory $documentFactory
     */
    public function __construct(
        ?WebPageRepository $webPageRepository = null,
        ?DocumentFactory $documentFactory = null
    ) {
        $this->webPageRepository = $webPageRepository ?? new WebPageRepository;
        $this->documentFactory = $documentFactory ?? new DocumentFactory;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return 'text/html';
    }

    /**
     * @return Path
     */
    public function getPath(): Path
    {
        return Path::fromString('/index.html');
    }

    /**
     * @return ContentInterface
     */
    public function getContent(): ContentInterface
    {
        $homepage = $this->webPageRepository->findHomePage();
        $document = $this->documentFactory->forHomePage($homepage);

        return StringContent::fromString(
            HTML5DocumentStringRenderer::render($document)
        );
    }
}