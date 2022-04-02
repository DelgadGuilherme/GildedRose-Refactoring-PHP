<?php

namespace GildedRose;

class AgedItem extends EnchantedItem
{
    
    public function passDay() {
        parent::passDay();

        if($this->canDecrease()) {
            $this->decreaseQuality();
        }
    }
}