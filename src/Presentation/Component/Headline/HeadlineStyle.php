<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Headline;

final class HeadlineStyle
{
    /**
     * Regular Headline Style
     */
    public const REGULAR = 'REGULAR';

    /**
     * Hero Headline Style
     */
    public const HERO = 'HERO';

    /**
     * Section Headline Style
     */
    public const SECTION = 'SECTION';

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $value
     */
    private function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return self
     */
    public static function regular(): self
    {
        return new self(self::REGULAR);
    }

    /**
     * @return self
     */
    public static function hero(): self
    {
        return new self(self::HERO);
    }

    /**
     * @return self
     */
    public static function section(): self
    {
        return new self(self::SECTION);
    }

    /**
     * @return bool
     */
    public function isRegular(): bool
    {
        return $this->value === self::REGULAR;
    }

    /**
     * @return bool
     */
    public function isHero(): bool
    {
        return $this->value === self::HERO;
    }

    /**
     * @return bool
     */
    public function isSection(): bool
    {
        return $this->value === self::SECTION;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return array
     */
    public static function getValues(): array
    {
        return [
            self::REGULAR,
            self::HERO,
            self::SECTION
        ];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value;
    }
}