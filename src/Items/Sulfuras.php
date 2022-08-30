<?php

namespace App\Items;

final class Sulfuras extends DefaultItem
{
    protected const QUALITY_HIGH_LIMIT = 80;

    /**
     * Update item quality and sell in counter at the end of day
     *
     * @return void
     */
    public function updateTick(): void
    {
        $this->item->quality = self::QUALITY_HIGH_LIMIT;
    }
}