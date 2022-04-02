<?php

declare(strict_types=1);

namespace GildedRose;

use phpDocumentor\Reflection\Types\Boolean;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;
    private $maxQuality = 50;
    private $minQuality = 0;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function canIncrease($itemQuality): Bool
    {
        return $itemQuality < $this->maxQuality ? true : false;  
    }

    public function canDecrease($itemQuality): Bool
    {
       return $itemQuality > $this->minQuality ? true : false;
    }

    public function decreaseQuality($item): Item
    {   
        $item->quality -= 1;
        return $item;
    }

    public function increaseQuality($item): Item
    {
        $item->quality += 1;
        return $item;
    }
    
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($this->canDecrease($item->quality)) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $this->decreaseQuality($item);
                    }
                }
            } else {
                if ($this->canIncrease($item->quality)) {
                    $this->increaseQuality($item);
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < 11) {
                            if ($this->canIncrease($item->quality)) {
                                $this->increaseQuality($item);
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($this->canIncrease($item->quality)) {
                                $this->increaseQuality($item);
                            }
                        }
                    }
                }
            }

            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($this->canDecrease($item->quality)) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                 $this->decreaseQuality($item);
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($this->canIncrease($item->quality)) {
                        $this->increaseQuality($item);
                    }
                }
            }
        }
    }
}
