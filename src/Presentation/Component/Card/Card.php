<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Card;

use PackageFactory\Website\Presentation\Component\Headline\Headline;
use PackageFactory\Website\Presentation\Component\Icon\Icon;
use PackageFactory\Website\Presentation\Component\Image\Image;
use PackageFactory\Website\Presentation\Component\Link\Link;

final class Card
{
    /**
     * @var CardLayout
     */
    private $layout;

    /**
     * @var Headline
     */
    private $headline;

    /**
     * @var string
     */
    private $text;

    /**
     * @var Link
     */
    private $link;

    /**
     * @var null|Image
     */
    private $image;

    /**
     * @var null|Icon
     */
    private $icon;

    /**
     * @param CardLayout $layout
     * @param Headline $headline
     * @param string $text
     * @param Link $link
     * @param null|Image $image
     * @param null|Icon $icon
     */
    private function __construct(
        CardLayout $layout,
        Headline $headline,
        string $text,
        Link $link,
        ?Image $image,
        ?Icon $icon
    ) {
        $this->layout = $layout;
        $this->headline = $headline;
        $this->text = $text;
        $this->link = $link;
        $this->image = $image;
        $this->icon = $icon;
    }

    /**
     * @return CardLayout
     */
    public function getLayout(): CardLayout
    {
        return $this->layout;
    }

    /**
     * @return Headline
     */
    public function getHeadline(): Headline
    {
        return $this->headline;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return Link
     */
    public function getLink(): Link
    {
        return $this->link;
    }

    /**
     * @return null|Image
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @return null|Icon
     */
    public function getIcon(): ?Icon
    {
        return $this->icon;
    }
}