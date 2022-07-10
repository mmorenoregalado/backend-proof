<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

use App\Productos\Product\Domain\ProductQuality;
use App\Productos\Product\Domain\TumiProductQuality;
use App\Productos\Product\Infrastructure\NormalProductRepository;
use App\Productos\Product\Infrastructure\PiscoPeruanoProductRepository;
use App\Productos\Product\Infrastructure\TicketVipRepository;
use App\Productos\Product\Infrastructure\TumiProductRepository;

final class Injector
{
    private array $injector = [
        'normal' => NormalProductRepository::class,
        'Pisco Peruano' => PiscoPeruanoProductRepository::class,
        'Tumi de Oro Moche' => TumiProductRepository::class,
        'Ticket VIP al concierto de Pick Floid' => TicketVipRepository::class,
    ];

    public static function injectTo(string $class)
    {
        return (new self)->getClassTo($class);
    }

    public function getClassTo(string $class)
    {
        return (new $this->injector[$class]);
    }
}
