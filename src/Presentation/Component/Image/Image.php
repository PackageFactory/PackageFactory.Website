<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Image;

final class Image
{
    /**
     * @var string
     */
    private $src;

    /**
     * @var string
     */
    private $alt;

    /**
     * @var null|string
     */
    private $title;

    /**
     * @param string $src
     * @param string $alt
     * @param null|string $title
     */
    public function __construct(
        string $src,
        string $alt,
        ?string $title
    ) {
        $this->src = $src;
        $this->alt = $alt;
        $this->title = $title;
    }

    /**
     * @param string $src
     * @param string $alt
     * @return self
     */
    public static function create(string $src, string $alt): self
    {
        return new self($src, $alt, null);
    }

    /**
     * @return string
     */
    public function getSrc(): string
    {
        return $this->src;
    }

    /**
     * @return string
     */
    public function getAlt(): string
    {
        return $this->alt;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return self
     */
    public function withTitle(string $title): self
    {
        return new self($this->src, $this->alt, $title);
    }
}