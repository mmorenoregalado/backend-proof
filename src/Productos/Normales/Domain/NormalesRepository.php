<?php

declare(strict_types=1);

namespace App\Productos\Normales\Domain;

use App\Shared\Domain\Repository;

interface NormalesRepository extends Repository
{
    public function calcularSellIn(NormalProduct $normal): NormalProduct;
}
