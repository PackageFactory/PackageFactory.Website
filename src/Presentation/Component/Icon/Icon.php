<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Icon;

final class Icon
{
    /**
     * @var string
     */
    private $icon;

    /**
     * @param string $icon
     */
    private function __construct(string $icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param string $icon
     * @return self
     */
    public static function create(string $icon): self
    {
        return new self($icon);
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }
}