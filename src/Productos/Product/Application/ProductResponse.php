<?php

declare(strict_types=1);

namespace App\Productos\Product\Application;


use App\Shared\Domain\Bus\Query\Response;

final class ProductResponse implements Response
{
    private string $nombre;
    private int $quality;
    private int $sellIn;

    public function __construct(string $nombre, int $quality, int $sellIn)
    {
        $this->nombre = $nombre;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function nombre(): string
    {
        return $this->nombre;
    }

    public function quality(): int
    {
        return $this->quality;
    }

    public function sellIn(): int
    {
        return $this->sellIn;
    }

}
