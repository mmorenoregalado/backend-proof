<?php

declare(strict_types=1);

namespace App\Productos\Product\Infrastructure;


use App\Productos\Product\Domain\ProductRepository;
use App\Productos\Product\Domain\Repository;

final class CafeProductRepository extends ProductRepository implements Repository
{
    private const DEGRADATION = 2;
    function calcularQuality(int $quality, int $sellIn): int
    {
        return ($sellIn > 0) ?
            $quality - self::DEGRADATION :
            $quality - (2 * self::DEGRADATION);
    }
}
