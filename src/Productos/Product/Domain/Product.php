<?php

declare(strict_types=1);

namespace App\Productos\Product\Domain;


final class Product
{
    private ProductName $name;
    private Quality $quality;
    private ProductSellIn $sellIn;

    public function __construct(ProductName $name, Quality $quality, ProductSellIn $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function create(ProductName $name, Quality $quality, ProductSellIn $sellIn): self
    {
        return new self($name, $quality, $sellIn);
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function quality(): Quality
    {
        return $this->quality;
    }

    public function sellIn(): ProductSellIn
    {
        return $this->sellIn;
    }

}
