<?php

namespace AppBundle\Util;

/**
 * Class UuidGenerator
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class UuidGenerator
{
    /**
     * Uuid constructor.
     */
    private function __construct() { }

    /**
     * @return string
     */
    public static function uuid4()
    {
        return \Ramsey\Uuid\Uuid::uuid4()->toString();
    }
}