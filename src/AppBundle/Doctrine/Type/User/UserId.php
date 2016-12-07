<?php

namespace AppBundle\Doctrine\Type\User;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

/**
 * Class UserId
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class UserId extends GuidType
{
    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new \AppBundle\User\Model\UserId($value);
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
        return 'user_id';
    }
}