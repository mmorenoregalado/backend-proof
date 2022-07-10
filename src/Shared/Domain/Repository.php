<?php

declare(strict_types=1);

namespace App\Shared\Domain;

interface Repository
{
    function calcularQuality(int $quality, int $sellIn): int;
}
