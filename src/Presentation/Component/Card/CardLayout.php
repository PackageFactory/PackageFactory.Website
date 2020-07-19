<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Card;

final class CardLayout
{
    /**
     * Horizontal Card Layout
     */
    public const HORIZONTAL = 'HORIZONTAL';

    /**
     * Vertical Card Layout
     */
    public const VERTICAL = 'VERTICAL';

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
    public static function horizontal(): self
    {
        return new self(self::HORIZONTAL);
    }

    /**
     * @return self
     */
    public static function vertical(): self
    {
        return new self(self::VERTICAL);
    }

    /**
     * @return bool
     */
    public function isHorizontal(): bool
    {
        return $this->value === self::HORIZONTAL;
    }

    /**
     * @return bool
     */
    public function isVertical(): bool
    {
        return $this->value === self::VERTICAL;
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
            self::HORIZONTAL,
            self::VERTICAL
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