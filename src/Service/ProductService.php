<?php

namespace App\Service;

use App\Repository\ProductRepository;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        $products = $this->productRepository->findAll();

        $counter = 0;
        while($counter < count($products)) {
            $products[$counter]->setIdentifier($products[$counter]->getName().'-'.$products[$counter]->getCode());
            $counter++;
        }

        return $products;
    }

    /**
     * @return mixed
     */
    public function getHighestPriceProduct(): mixed
    {
        return $this->productRepository->findHighestPriceProduct();
    }
}