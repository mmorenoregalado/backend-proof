<?php

declare(strict_types=1);

namespace App\Productos\Normales\Application;


use App\Productos\Normales\Domain\NormalProduct;
use App\Productos\Normales\Domain\NormalesCalculator;
use App\Productos\Normales\Domain\NormalesRepository;
use App\Productos\Normales\Domain\NormalProductName;
use App\Productos\Normales\Domain\NormalProductQuality;
use App\Productos\Normales\Domain\NormalProductSellIn;
use App\Productos\Normales\Infrastructure\NormalesProductRepository;
use App\Shared\Domain\Bus\Query\Response;

final class NormalesCounter implements NormalesCalculator
{
    private NormalesRepository $repository;

    public function __construct()
    {
        $this->repository = new NormalesProductRepository();
    }

    public function __invoke(string $name, int $quality, int $sellIn): Response
    {
        $normal = NormalProduct::create(
            new NormalProductName($name),
            new NormalProductQuality($quality),
            new NormalProductSellIn($sellIn)
        );
        $product =  $this->repository->calcularSellIn($normal);

        return  $this->toResponse($product);

    }


    private function toResponse(NormalProduct $product): NormalesProductResponse
    {
        return new NormalesProductResponse(
            $product->name()->value(),
            $product->quality()->value(),
            $product->sellIn()->value()
        );
    }

}
