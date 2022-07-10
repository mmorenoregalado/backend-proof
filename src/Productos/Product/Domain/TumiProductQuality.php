<?php

declare(strict_types=1);

namespace App\Productos\Product\Domain;


use App\Shared\Domain\ValueObject\IntValueObject;

final class TumiProductQuality extends IntValueObject implements Quality
{
    private const Quality = 80;

    public function __construct(int $value)
    {
        parent::__construct(self::Quality);
    }
}
