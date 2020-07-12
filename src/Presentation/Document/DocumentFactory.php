<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Document;

use PackageFactory\KristlBol\Domain\Document;
use PackageFactory\VirtualDOM\Attribute;
use PackageFactory\VirtualDOM\Attributes;
use PackageFactory\VirtualDOM\DangerouslyUnescapedText;
use PackageFactory\VirtualDOM\Element;
use PackageFactory\VirtualDOM\ElementType;
use PackageFactory\VirtualDOM\NodeList;
use PackageFactory\VirtualDOM\Text;
use PackageFactory\Website\Domain\WebPage\WebPage;
use PackageFactory\Website\Presentation\Component\SiteHeader\SiteHeader;

final class DocumentFactory
{
    /**
     * @var TitleFactory
     */
    private $titleFactory;

    /**
     * @var JsonLdFactory
     */
    private $jsonLdFactory;

    /**
     * @var StyleSheetLinkFactory
     */
    private $styleSheetLinkFactory;

    public function __construct()
    {
        $this->titleFactory = new TitleFactory();
        $this->jsonLdFactory = new JsonLdFactory();
        $this->styleSheetLinkFactory = new StyleSheetLinkFactory();
    }

    public function forWebPage(WebPage $webPage): Document
    {
        $path = rtrim(parse_url($webPage->getUrl(), PHP_URL_PATH), '/');
        if (!substr($path, -5) === '.html') {
            $path .= '/index.html';
        }
        
        $document = Document::empty($path);
        return $document
            ->withHead(
                $document->getHead()->withChildren(
                    $document->getHead()->getChildren()
                        ->withAppendedNode(
                            $this->titleFactory->forWebPage($webPage)
                        )
                        ->withAppendedNode(
                            $this->jsonLdFactory->forWebPage($webPage)
                        )
                        ->withAppendedNode(
                            $this->styleSheetLinkFactory->forWebPage($webPage)
                        )
                )
            )
        ;
    }

    public function forHomePage(WebPage $homepage): Document
    {
        $document = $this->forWebPage($homepage)->withPath('/index.html');
        return $document->withBody(
            $document->getBody()->withChildren(
                $document->getBody()->getChildren()->withPrependedNode(
                    SiteHeader::create()->getAsVirtualDOMNode()
                )
            )
        );
    }
}