<?php

declare(strict_types=1);

namespace R4w\Snap\Game\Entity;

abstract class CardCollection
{
    /** @var Card[] */
    protected array $cards = [];

    public function addCards(CardCollection $collection): void
    {
        $this->cards = array_merge($this->toArray(), $collection->toArray());
    }

    public function count(): int
    {
        return count($this->cards);
    }

    public function dealCard(): Card
    {
        if ($this->count() === 0) {
            throw new \RuntimeException('Out of cards.');
        }
        return array_pop($this->cards);
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    /**
     * @return Card[]
     */
    protected function toArray(): array
    {
        return $this->cards;
    }
}
