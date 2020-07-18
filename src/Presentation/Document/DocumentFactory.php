<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Document;

use PackageFactory\VirtualDOM\Component\Document;
use PackageFactory\VirtualDOM\Component\Body;
use PackageFactory\VirtualDOM\Component\Head;
use PackageFactory\VirtualDOM\Component\Link;
use PackageFactory\VirtualDOM\Component\Script;
use PackageFactory\VirtualDOM\Model\Children;
use PackageFactory\Website\Domain\WebPage\WebPage;
use PackageFactory\Website\Presentation\Component\HeroStage\HeroStage;
use PackageFactory\Website\Presentation\Component\SiteHeader\SiteHeader;

final class DocumentFactory
{
    public function forWebPage(WebPage $webPage): Document
    {
        $path = rtrim(parse_url($webPage->getUrl(), PHP_URL_PATH), '/');
        if (!substr($path, -5) === '.html') {
            $path .= '/index.html';
        }
        
        return new Document(
            'html',
            Head::fromTitle($webPage->getName())
                ->withLink(Link::stylesheet('/css/main.css'))
                ->withScript(Script::jsonLd(json_encode($webPage->getAsJsonLD()))),
            Body::empty()
        );
    }

    public function forHomePage(WebPage $homepage): Document
    {
        $document = $this->forWebPage($homepage);

        return $document->withBody(
            $document->getBody()->withChildren(
                $document->getBody()->getChildren()->withPrependedChildren(
                    Children::fromArray([
                        SiteHeader::create(),
                        HeroStage::create('PackageFactory')
                    ])
                )
            )
        );
    }
}