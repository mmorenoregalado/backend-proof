<?php

declare(strict_types=1);

namespace App\Productos\Product\Infrastructure;


use App\Productos\Product\Domain\Product;
use App\Productos\Product\Domain\ProductRepository;
use App\Productos\Product\Domain\Repository;

final class TumiProductRepository extends ProductRepository implements Repository
{
    public function calcularSellIn(Product $product): Product
    {
        return Product::create($product->name(), $product->quality(), $product->sellIn());
    }

    function calcularQuality(int $quality, int $sellIn): int
    {
        return $quality;
    }
}
