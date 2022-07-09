<?php

declare(strict_types=1);

namespace App\Productos\Normales\Application;


use App\Productos\Normales\Domain\NormalProduct;
use App\Productos\Normales\Domain\NormalesCalculator;
use App\Productos\Normales\Domain\NormalesRepository;
use App\Productos\Normales\Domain\NormalProductName;
use App\Productos\Normales\Domain\NormalProductQuality;
use App\Productos\Normales\Domain\NormalProductSellIn;
use App\Shared\Domain\ProductDomain\ProductTick;

final class NormalesCounter implements NormalesCalculator
{
    private NormalesRepository $repository;

    public function __construct(NormalesRepository $repository)
    {
        $this->repository($repository);
    }

    public function __invoke(string $name, int $quality, int $sellIn)
    {
        $normal = NormalProduct::create(
            new NormalProductName($name),
            new NormalProductQuality($quality),
            new NormalProductSellIn($sellIn)
        );
        $normalProduct = $this->repository->calcularSellIn($normal);
    }

}
