<?php

declare(strict_types=1);

namespace App\Productos\Normales\Domain;

final class NormalProduct
{
    private NormalProductName $name;
    private NormalProductQuality $quality;
    private NormalProductSellIn $sellIn;

    public function __construct(NormalProductName $name, NormalProductQuality $quality, NormalProductSellIn $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function create(NormalProductName $name, NormalProductQuality $quality, NormalProductSellIn
    $sellIn): self
    {
        return new self($name, $quality, $sellIn);
    }

    public function name(): NormalProductName
    {
        return $this->name;
    }

    public function quality(): NormalProductQuality
    {
        return $this->quality;
    }

    public function sellIn(): NormalProductSellIn
    {
        return $this->sellIn;
    }

}
