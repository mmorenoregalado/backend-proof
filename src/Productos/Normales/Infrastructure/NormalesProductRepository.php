<?php

declare(strict_types=1);

namespace App\Productos\Normales\Infrastructure;

use App\Productos\Normales\Domain\NormalProduct;
use App\Productos\Normales\Domain\NormalesRepository;
use App\Productos\Normales\Domain\NormalProductQuality;
use App\Productos\Normales\Domain\NormalProductSellIn;

final class NormalesProductRepository implements NormalesRepository
{

    public function calcularSellIn(NormalProduct $product): NormalProduct
    {
        $sellIn = $product->sellIn()->value();
        $quality = $product->quality()->value();

        $quality = $this->calcularQuality($quality, $sellIn);

        $sellIn--;

        return NormalProduct::create(
            $product->name(),
            new NormalProductQuality($quality),
            new NormalProductSellIn($sellIn)
        );
    }

    function calcularQuality(int $quality, int $sellIn): int
    {
        return ($sellIn > 0) ?
            $quality - 1 :
            $quality - 2;
    }
}
