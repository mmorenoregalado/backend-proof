<?php

declare(strict_types=1);

namespace App\Productos\Product\Domain;

interface Repository
{
    function calcularQuality(int $quality, int $sellIn): int;
}
