<?php

namespace App;

use App\Productos\Product\Application\ProductCounter;
use App\Productos\Product\Application\ProductResponse;
use App\Productos\Product\Domain\NormalesCalculator;
use App\Shared\Infrastructure\Injector;

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

        $producto = new ProductCounter($this->name);

        $response = $producto->__invoke($this->name, $this->quality, $this->sellIn);

        $this->quality = $response->quality();
        $this->sellIn = $response->sellIn();

    }

//    public function tick()
//    {
//        if ($this->name != 'Pisco Peruano' and $this->name != 'Ticket VIP al concierto de Pick Floid') {
//            if ($this->quality > 0) {
//                if ($this->name != 'Tumi de Oro Moche') {
//                    $this->quality = $this->quality - 1;
//                }
//            }
//        } else { //normal
//            if ($this->quality < 50) {
//                $this->quality = $this->quality + 1;
//
//                if ($this->name == 'Ticket VIP al concierto de Pick Floid') {
//                    if ($this->sellIn < 11) {
//                        if ($this->quality < 50) {
//                            $this->quality = $this->quality + 1;
//                        }
//                    }
//                    if ($this->sellIn < 6) {
//                        if ($this->quality < 50) {
//                            $this->quality = $this->quality + 1;
//                        }
//                    }
//                }
//            }
//        }
//
//        if ($this->name != 'Tumi de Oro Moche') {
//            $this->sellIn = $this->sellIn - 1;
//        }
//
//        if ($this->sellIn < 0) {
//            if ($this->name != 'Pisco Peruano') {
//                if ($this->name != 'Ticket VIP al concierto de Pick Floid') {
//                    if ($this->quality > 0) {
//                        if ($this->name != 'Tumi de Oro Moche') {
//                            $this->quality = $this->quality - 1;
//                        }
//                    }
//                } else {
//                    $this->quality = $this->quality - $this->quality;
//                }
//            } else {
//                if ($this->quality < 50) {
//                    $this->quality = $this->quality + 1;
//                }
//            }
//        }
//    }
}
