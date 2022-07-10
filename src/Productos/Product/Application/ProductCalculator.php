<?php

declare(strict_types=1);

namespace App\Productos\Product\Application;


use App\Productos\Product\Domain\Product;
use App\Productos\Product\Domain\ProductName;
use App\Productos\Product\Domain\ProductQuality;
use App\Productos\Product\Domain\ProductSellIn;
use App\Productos\Product\Domain\Repository;
use App\Shared\Domain\Bus\Query\Response;
use App\Shared\Infrastructure\Injector;

final class ProductCalculator
{
    private Repository $repository;

    public function __construct(string $name)
    {
        $this->repository = Injector::injectTo($name);
    }

    public function __invoke(string $name, int $quality, int $sellIn): Response
    {
        $normal = Product::create(
            new ProductName($name),
            new ProductQuality($quality),
            new ProductSellIn($sellIn)
        );
        $product =  $this->repository->calcularSellIn($normal);

        return  $this->toResponse($product);

    }

    private function toResponse(Product $product): ProductResponse
    {
        return new ProductResponse(
            $product->name()->value(),
            $product->quality()->value(),
            $product->sellIn()->value()
        );
    }

}
