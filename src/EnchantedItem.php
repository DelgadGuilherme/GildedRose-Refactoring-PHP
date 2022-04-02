<?php

namespace GildedRose;

class EnchantedItem extends Item
{
    private $maxQuality = 50;
    private $minQuality = 0;

    public function passDay() {
        $this->decrementSellIn();
    }

    public function canIncrease(): Bool
    {
        return $this->quality < $this->maxQuality ? true : false;  
    }

    public function canDecrease(): Bool
    {
       return $this->quality > $this->minQuality ? true : false;
    }

    public function decreaseQuality(): int
    {   
        return $this->expired() ? $this->quality -= 2 :  $this->quality -= 1;
    }

    public function increaseQuality(): int
    {
        return $this->quality += 1;
    }

    public function decrementSellIn(): void {
        $this->sell_in -= 1;
    }

    public function expired(): bool 
    {
        
        return $this->sell_in <= 0 ? true : false;
    }


}