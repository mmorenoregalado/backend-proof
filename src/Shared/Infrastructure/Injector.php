<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

use App\Productos\Normales\Application\NormalesCounter;

final class Injector
{
    private array $injector = [
        'normal' => NormalesCounter::class,
    ];

    public static function injectTo(string $class): object
    {
        return (new self)->getClassTo($class);
    }

    public function getClassTo(string $class)
    {
        return (new $this->injector[$class]);
    }
}
