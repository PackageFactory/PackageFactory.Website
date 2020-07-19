<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Headline;

final class HeadlineType
{
    /**
     * Headline 1
     */
    public const H1 = 'h1';

    /**
     * Headline 2
     */
    public const H2 = 'h2';

    /**
     * Headline 3
     */
    public const H3 = 'h3';

    /**
     * Headline 4
     */
    public const H4 = 'h4';

    /**
     * Headline 5
     */
    public const H5 = 'h5';

    /**
     * Headline 6
     */
    public const H6 = 'h6';

    /**
     * NONE
     */
    public const NONE = 'div';

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
    public static function h1(): self
    {
        return new self(self::H1);
    }

    /**
     * @return self
     */
    public static function h2(): self
    {
        return new self(self::H2);
    }

    /**
     * @return self
     */
    public static function h3(): self
    {
        return new self(self::H3);
    }

    /**
     * @return self
     */
    public static function h4(): self
    {
        return new self(self::H4);
    }

    /**
     * @return self
     */
    public static function h5(): self
    {
        return new self(self::H5);
    }

    /**
     * @return self
     */
    public static function h6(): self
    {
        return new self(self::H6);
    }

    /**
     * @return self
     */
    public static function none(): self
    {
        return new self(self::NONE);
    }

    /**
     * @return bool
     */
    public function isH1(): bool
    {
        return $this->value === self::H1;
    }

    /**
     * @return bool
     */
    public function isH2(): bool
    {
        return $this->value === self::H2;
    }

    /**
     * @return bool
     */
    public function isH3(): bool
    {
        return $this->value === self::H3;
    }

    /**
     * @return bool
     */
    public function isH4(): bool
    {
        return $this->value === self::H4;
    }

    /**
     * @return bool
     */
    public function isH5(): bool
    {
        return $this->value === self::H5;
    }

    /**
     * @return bool
     */
    public function isH6(): bool
    {
        return $this->value === self::H6;
    }

    /**
     * @return bool
     */
    public function isNone(): bool
    {
        return $this->value === self::NONE;
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
            self::H1,
            self::H2,
            self::H3,
            self::H4,
            self::H5,
            self::H6,
            self::NONE
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