<?php

namespace AppBundle\Product\Command;

use AppBundle\Product\Model\Price;
use AppBundle\Product\Model\Product;
use AppBundle\Repository\ProductRepository;

/**
 * Class AddProductHandler
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class AddProductHandler
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * RegisterUserHandler constructor.
     *
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param AddProductCommand $command
     */
    public function handle(AddProductCommand $command)
    {
        $product = new Product();
        $price   = new Price($command->getPrice(), $command->getCurrency());

        $product->setId($command->getId());
        $product->setName($command->getName());
        $product->setDescription($command->getDescription());
        $product->setPrice($price);

        $this->productRepository->add($product);
    }
}