<?php

namespace App;

use App\Productos\Product\Application\ProductCalculator;

final class VillaPeruana
{
    public string $name;

    public int $quality;

    public int $sellIn;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {

        $producto = new ProductCalculator($this->name);

        $response = $producto->__invoke($this->name, $this->quality, $this->sellIn);

        $this->quality = $response->quality();
        $this->sellIn = $response->sellIn();

    }
}
