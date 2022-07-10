<?php

declare(strict_types=1);

namespace App\Productos\Product\Domain;

use App\Shared\Domain\ValueObject\IntValueObject;

final class ProductQuality extends IntValueObject
{
    public const MAXIMO = 50;
    public const MINIMO = 0;

    public function __construct(int $value)
    {
        $quality = $this->checkMaxQueality($value);
        $quality = $this->checkMinQuality($quality);
        parent::__construct($quality);
    }

    private function checkMaxQueality(int $quality): int
    {
        if($quality > self::MAXIMO) return self::MAXIMO;

        return $quality;
    }

    private function checkMinQuality(int $quality): int
    {
        if($quality < self::MINIMO ) return self::MINIMO;

        return $quality;
    }
}
