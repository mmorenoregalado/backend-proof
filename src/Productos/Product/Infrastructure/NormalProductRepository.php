<?php

declare(strict_types=1);

namespace App\Productos\Product\Infrastructure;

use App\Productos\Product\Domain\Product;
use App\Productos\Product\Domain\ProductQuality;
use App\Productos\Product\Domain\ProductRepository;
use App\Productos\Product\Domain\ProductSellIn;
use App\Productos\Product\Domain\Repository;

final class NormalProductRepository extends ProductRepository implements Repository
{

    function calcularQuality(int $quality, int $sellIn): int
    {
        return ($sellIn > 0) ?
            $quality - 1 :
            $quality - 2;
    }
}
