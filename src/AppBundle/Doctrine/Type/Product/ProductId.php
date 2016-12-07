<?php

namespace AppBundle\Doctrine\Type\Product;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

/**
 * Class ProductId
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class ProductId extends GuidType
{
    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new \AppBundle\Product\Model\ProductId($value);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return (string)$value;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'product_id';
    }
}