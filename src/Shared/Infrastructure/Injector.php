<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

use App\Productos\Normales\Domain\NormalesRepository;
use App\Shared\Domain\Repository;

final class Injector
{
    private array $injector = [
        'normal' => NormalesRepository::class,
    ];

    public static function injectTo(string $class): Repository
    {
        return (new self)->getClassTo($class);
    }

    public function getClassTo(string $class)
    {
        return new ($this->injector[$class]);
    }
}
