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
        $newQuality = $product->quality()->value();
        $newSellIn = $product->quality()->value() - 1;

        ($product->quality()->isBiggerThan(0)) ? $newQuality-- : $newQuality -= 2;


        return NormalProduct::create(
            $product->name(),
            new NormalProductQuality($newQuality),
            new NormalProductSellIn($newSellIn)
        );
    }
}
