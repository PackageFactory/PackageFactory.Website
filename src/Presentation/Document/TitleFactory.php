<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Document;

use PackageFactory\VirtualDOM\Attributes;
use PackageFactory\VirtualDOM\Element;
use PackageFactory\VirtualDOM\ElementType;
use PackageFactory\VirtualDOM\NodeList;
use PackageFactory\VirtualDOM\Text;
use PackageFactory\Website\Domain\WebPage\WebPage;

final class TitleFactory
{
    public function forWebPage(WebPage $webPage): Element
    {
        return Element::create(
            ElementType::fromTagName('title'),
            Attributes::createEmpty(),
            NodeList::create(Text::fromString($webPage->getName()))
        );
    }
}