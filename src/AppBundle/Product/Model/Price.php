<?php

namespace AppBundle\Product\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Price
 *
 * @ORM\Embeddable
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class Price extends \AppBundle\Money\Price
{
    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    protected $price;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3)
     */
    protected $currencyISOCode;
}