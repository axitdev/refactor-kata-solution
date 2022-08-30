<?php

namespace App\Items;

use App\Item;

class DefaultItem
{
    protected $item;

    protected const QUALITY_HIGH_LIMIT = 50;
    protected const QUALITY_LOW_LIMIT = 0;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Update item quality and sell in counter at the end of day
     *
     * @return void
     */
    public function updateTick(): void
    {
        $this->subtractSellIn();
        $this->reduceQuality();

        if ($this->item->sell_in <= 0) {
            $this->reduceQuality();
        }

        $this->normalizeQuality();
    }

    protected function increaseQuality(): void
    {
        ++$this->item->quality;
    }

    protected function reduceQuality(): void
    {
        --$this->item->quality;
    }

    protected function subtractSellIn(): void
    {
        --$this->item->sell_in;
    }

    protected function normalizeQuality(): void
    {
        if ($this->item->quality < self::QUALITY_LOW_LIMIT) {
            $this->item->quality = self::QUALITY_LOW_LIMIT;
        }

        if ($this->item->quality > self::QUALITY_HIGH_LIMIT) {
            $this->item->quality = self::QUALITY_HIGH_LIMIT;
        }
    }
}