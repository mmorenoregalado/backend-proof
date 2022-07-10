<?php

declare(strict_types=1);

namespace App\Productos\Product\Domain;


abstract class ProductRepository
{
    public function calcularSellIn(Product $product): Product
    {
        $sellIn = $product->sellIn()->value();
        $quality = $product->quality()->value();

        $quality = $this->calcularQuality($quality, $sellIn);

        $sellIn--;

        return Product::create(
            $product->name(),
            new ProductQuality($quality),
            new ProductSellIn($sellIn)
        );
    }
}
