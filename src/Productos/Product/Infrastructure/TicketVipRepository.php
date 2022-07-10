<?php

declare(strict_types=1);

namespace App\Productos\Product\Infrastructure;


use App\Productos\Product\Domain\ProductRepository;
use App\Productos\Product\Domain\Repository;

final class TicketVipRepository extends ProductRepository implements Repository
{

    function calcularQuality(int $quality, int $sellIn): int
    {
        if ($sellIn > 10) {
            $quality++;
        }else if ($sellIn > 5 && $sellIn <= 10) {
            $quality +=2;
        } else if ($sellIn > 0 && $sellIn <= 5) {
            $quality +=3;
        } else {
            $quality = 0;
        }
        return $quality;
    }
}
