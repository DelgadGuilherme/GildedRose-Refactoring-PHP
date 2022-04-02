<?php

declare(strict_types=1);

namespace GildedRose;

use phpDocumentor\Reflection\Types\Boolean;

final class GildedRose
{

    private $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function setItems($item): void 
    {
        array_push($items, $item);
    }

    public function getItems(): array {
        return $this->items;
    }
   
    public function updateQuality(): void
    {
        foreach ($this->getItems as $item) {
            $item->passDay();
        }
    }
}
