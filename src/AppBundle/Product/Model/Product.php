<?php

namespace AppBundle\Product\Model;

use AppBundle\Common\Model\ModifiedTimeTrait;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Product
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class Product
{
    use ModifiedTimeTrait;

    /**
     * @var ProductId
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="product_id")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    protected $description;

    /**
     * @var Price
     *
     * @ORM\Embedded(class="Price", columnPrefix=false)
     */
    protected $price;

    /**
     * Epic constructor.
     */
    public function __construct()
    {
        $this->id = new ProductId();
    }

    /**
     * @return ProductId
     */
    public function getId(): ProductId
    {
        return $this->id;
    }

    /**
     * @param ProductId $id
     *
     * @return Product
     */
    public function setId(ProductId $id): Product
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return Product
     */
    public function setDescription(string $description): Product
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     *
     * @return Product
     */
    public function setPrice(Price $price)
    {
        $this->price = $price;

        return $this;
    }
}


