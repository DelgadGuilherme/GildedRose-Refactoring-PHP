<?php

namespace GildedRose;

class NormalItem extends EnchantedItem
{
    
    public function passDay() {
        parent::passDay();

        if($this->canDecrease()) {
            $this->decreaseQuality();
        }
    }
}