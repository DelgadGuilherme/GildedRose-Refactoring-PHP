<?php 

namespace GildedRose;

class BackstagePassesItem extends EnchantedItem 
{   
    private $firstTier = 10;
    private $secondTier = 5;

    public function passDay() {
        parent::passDay();

        if($this->canIncrease()){
            if($this->sell_in <= $this->firstTier) {
                $this->increaseQualityFirstTier();
            } 
            if ($this->sell_in <= $this->secondTier) {
                $this->increaseQualitySecondTier();
            }
        }

        if ($this->expired()) {
            $this->quality = 0;
        }
    }

    public function increaseQualityFirstTier(): void
    {
        $this->quality += 2;
    }

    public function increaseQualitySecondTier(): void
    {
        $this->quality += 3;
    }
    
}