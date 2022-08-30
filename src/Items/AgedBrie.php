<?php

namespace App\Items;

final class AgedBrie extends DefaultItem
{
    /**
     * Update item quality and sell in counter at the end of day
     *
     * @return void
     */
    public function updateTick(): void
    {
        $this->subtractSellIn();
        $this->increaseQuality();

        if ($this->item->sell_in <= 0) {
            $this->increaseQuality();
        }

        $this->normalizeQuality();
    }
}