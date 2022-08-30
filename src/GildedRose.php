<?php

namespace App;

use App\Items\Factories\CustomItemFactory;

final class GildedRose
{
    public function updateQuality(Item $item): void
    {
        CustomItemFactory::fromItem($item)->updateTick();
    }
}