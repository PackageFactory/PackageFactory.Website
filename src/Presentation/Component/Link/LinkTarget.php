<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Link;

final class LinkTarget
{
    /**
     * targt="_self"
     */
    public const _SELF = '_self';

    /**
     * targt="_blank"
     */
    public const _BLANK = '_blank';

    /**
     * targt="_parent"
     */
    public const _PARENT = '_parent';

    /**
     * targt="_top"
     */
    public const _TOP = '_top';

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
    public static function self(): self
    {
        return new self(self::_SELF);
    }

    /**
     * @return self
     */
    public static function blank(): self
    {
        return new self(self::_BLANK);
    }

    /**
     * @return self
     */
    public static function parent(): self
    {
        return new self(self::_PARENT);
    }

    /**
     * @return self
     */
    public static function top(): self
    {
        return new self(self::_TOP);
    }

    /**
     * @return bool
     */
    public function isSelf(): bool
    {
        return $this->value === self::_SELF;
    }

    /**
     * @return bool
     */
    public function isBlank(): bool
    {
        return $this->value === self::_BLANK;
    }

    /**
     * @return bool
     */
    public function isParent(): bool
    {
        return $this->value === self::_PARENT;
    }

    /**
     * @return bool
     */
    public function isTop(): bool
    {
        return $this->value === self::_TOP;
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
            self::_SELF,
            self::_BLANK,
            self::_PARENT,
            self::_TOP
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