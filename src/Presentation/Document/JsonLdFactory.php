<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Document;

use PackageFactory\VirtualDOM\Attribute;
use PackageFactory\VirtualDOM\Attributes;
use PackageFactory\VirtualDOM\DangerouslyUnescapedText;
use PackageFactory\VirtualDOM\Element;
use PackageFactory\VirtualDOM\ElementType;
use PackageFactory\VirtualDOM\NodeList;
use PackageFactory\Website\Domain\WebPage\WebPage;

final class JsonLdFactory
{
    public function forWebPage(WebPage $webPage): Element
    {
        return Element::create(
            ElementType::fromTagName('script'),
            Attributes::fromArray([
                Attribute::fromNameAndValue('type', 'application/ld+json')
            ]),
            NodeList::create(
                DangerouslyUnescapedText::fromString(
                    json_encode($webPage->getAsJsonLD())
                )
            )
        );
    }
}