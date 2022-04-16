<?php 

namespace GildedRose;

class ConjuredItem extends EnchantedItem 
{   
    public function passDay() {
        parent::passDay();

        if($this->canDecrease()) {
            $this->decreaseQuality();
        }
    }

    public function decreaseQuality(): int
    {
        return $this->quality -= 2;
    }
    
}