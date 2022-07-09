<?php

declare(strict_types=1);

namespace App\Shared\Domain\ProductDomain;


abstract class Product
{
    private ProductName $name;
    private ProductQuality $quality;
    private ProductSellIn $sellIn;

    public function __construct(ProductName $name, ProductQuality $quality, ProductSellIn $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    abstract public static function create(ProductName $name, ProductQuality $quality, ProductSellIn $sellIn): self ;

    public function name(): ProductName
    {
        return $this->name;
    }

    public function quality(): ProductQuality
    {
        return $this->quality;
    }

    public function sellIn(): ProductSellIn
    {
        return $this->sellIn;
    }

}
