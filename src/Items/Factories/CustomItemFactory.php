<?php

namespace App\Items\Factories;

use App\Item;
use App\Items\DefaultItem;
use App\Items\AgedBrie;
use App\Items\BackstagePass;
use App\Items\Sulfuras;

final class CustomItemFactory
{
    private const AGED_BRIE_ITEM_NAME = 'Aged Brie';
    private const BACKSTAGE_PASS_ITEM_NAME = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS_ITEM_NAME = 'Sulfuras, Hand of Ragnaros';

    private static $map = [
        self::AGED_BRIE_ITEM_NAME => AgedBrie::class,
        self::BACKSTAGE_PASS_ITEM_NAME => BackstagePass::class,
        self::SULFURAS_ITEM_NAME => Sulfuras::class
    ];

    /**
     * Create custom item from Item object
     *
     * @param Item $item
     * @return DefaultItem
     */
    public static function fromItem(Item $item): DefaultItem
    {
        $class = self::$map[$item->name] ?? DefaultItem::class;

        return new $class($item);
    }
}