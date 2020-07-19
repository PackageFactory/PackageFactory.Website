<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Headline;

use PackageFactory\VirtualDOM\Model\ComponentInterface;
use PackageFactory\VirtualDOM\Model\Text;

final class Headline
{
    /**
     * @var HeadlineType
     */
    private $type;

    /**
     * @var HeadlineStyle
     */
    private $style;

    /**
     * @var ComponentInterface
     */
    private $content;

    /**
     * @param HeadlineType $type
     * @param HeadlineStyle $style
     * @param ComponentInterface $content
     */
    private function __construct(
        ?HeadlineType $type,
        ?HeadlineStyle $style,
        ComponentInterface $content
    ) {
        $this->type = $type ?? HeadlineType::none();
        $this->style = $style ?? HeadlineStyle::regular();
        $this->content = $content;
    }

    /**
     * @param string $content
     * @return self
     */
    public static function fromString(string $string): self
    {
        return self::fromContent(Text::fromString($string));
    }

    /**
     * @param ComponentInterface $content
     * @return self
     */
    public static function fromContent(ComponentInterface $content): self
    {
        return new self(null, null, $content);
    }

    /**
     * @return HeadlineType
     */
    public function getType(): HeadlineType
    {
        return $this->type;
    }

    /**
     * @param HeadlineType $type
     * @return self
     */
    public function withType(HeadlineType $type): self
    {
        return new self($type, $this->style, $this->content);
    }

    public function getStyle(): HeadlineStyle
    {
        return $this->style;
    }

    /**
     * @param HeadlineStyle $style
     * @return self
     */
    public function withStyle(HeadlineStyle $style): self
    {
        return new self($this->type, $style, $this->content);
    }

    public function getContent(): ComponentInterface
    {
        return $this->content;
    }
}