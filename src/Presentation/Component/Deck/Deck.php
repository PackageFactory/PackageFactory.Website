<?php declare(strict_types=1);
namespace PackageFactory\Website\Presentation\Component\Deck;

use PackageFactory\Website\Presentation\Component\Card\Card;

final class Deck
{
    /**
     * @var array|Card[]
     */
    private $cards;

    /**
     * @param Card ...$cards
     */
    private function __construct(Card ...$cards)
    {
        $this->cards = $cards;
    }

    /**
     * @param array $cards
     * @return self
     */
    public static function fromCards(array $cards): self
    {
        return new self(...$cards);
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }
}