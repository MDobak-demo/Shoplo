<?php

namespace AppBundle\Product\Command;

use AppBundle\Product\Model\ProductId;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AddProductCommand
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class AddProductCommand
{
    /**
     * @var ProductId
     */
    protected $id;
    
    /**
     * @Assert\NotNull()
     *
     * @var string
     */
    protected $name;

    /**
     * @Assert\NotNull()
     * @Assert\Length(min=100)
     *
     * @var string
     */
    protected $description;

    /**
     * @Assert\NotNull()
     *
     * @var float
     */
    protected $price;

    /**
     * @Assert\NotNull()
     * @Assert\Length(min=3, max=3)
     *
     * @var string
     */
    protected $currency;

    /**
     * AddProductCommand constructor.
     *
     * @param ProductId $id
     * @param string    $name
     * @param string    $description
     * @param float     $price
     * @param string    $currency
     */
    public function __construct(ProductId $id, string $name, string $description, float $price, string $currency)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->price       = $price;
        $this->currency    = $currency;
    }

    /**
     * @return ProductId
     */
    public function getId(): ProductId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }
}