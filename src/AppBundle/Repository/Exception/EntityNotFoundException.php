<?php

namespace AppBundle\Repository\Exception;

/**
 * Class EntityNotFoundException
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class EntityNotFoundException extends \Exception
{
    public static function create()
    {
        throw new static("Entity not found");
    }
}