<?php

namespace AppBundle\Money\Exception;

/**
 * Class InvalidISOCodeException
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class InvalidISOCodeException extends \Exception
{
    /**
     * @param $ISOCode
     */
    public static function create($ISOCode)
    {
        throw new static(sprintf("Unknown currency ISO code %s.", $ISOCode));
    }
}