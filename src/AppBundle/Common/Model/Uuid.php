<?php

namespace AppBundle\Common\Model;

use AppBundle\Util\UuidGenerator;

/**
 * Class Uuid
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class Uuid
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * Uuid constructor.
     *
     * @param string|null $uuid
     */
    public function __construct(string $uuid = null)
    {
        if (null !== $uuid) {
            $this->uuid = $uuid;
        } else {
            $this->uuid = UuidGenerator::uuid4();
        }
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this;
    }

    /**
     * @param Uuid $uuid
     *
     * @return bool
     */
    public function equals(Uuid $uuid)
    {
        return $this->uuid === (string)$uuid;
    }
}