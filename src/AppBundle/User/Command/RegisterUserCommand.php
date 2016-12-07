<?php

namespace AppBundle\User\Command;

use AppBundle\User\Model\UserId;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class RegisterUserCommand
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class RegisterUserCommand
{
    /**
     * @var UserId
     */
    protected $id;
    
    /**
     * @Assert\NotNull()
     * @Assert\Email()
     *
     * @var string
     */
    protected $email;

    /**
     * @Assert\NotNull()
     * @Assert\Length(min=6)
     *
     * @var string
     */
    protected $password;

    /**
     * @Assert\NotNull()
     * @Assert\Length(min=3)
     *
     * @var string
     */
    protected $firstName;

    /**
     * @Assert\NotNull()
     * @Assert\Length(min=3)
     *
     * @var string
     */
    protected $lastName;

    /**
     * Constructor
     *
     * @param UserId $id
     * @param string $email
     * @param string $password
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(UserId $id, string $email, string $password, string $firstName, string $lastName)
    {
        $this->id        = $id;
        $this->email     = $email;
        $this->password  = $password;
        $this->firstName = $firstName;
        $this->lastName  = $lastName;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
}