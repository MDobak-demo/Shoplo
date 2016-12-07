<?php

namespace AppBundle\User\Command;

use AppBundle\User\Model\User;
use AppBundle\Repository\UserRepository;

/**
 * Class RegisterUserHandler
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class RegisterUserHandler
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterUserHandler constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param RegisterUserCommand $command
     */
    public function handle(RegisterUserCommand $command)
    {
        $user = new User();

        $user->setId($command->getId());
        $user->setEmail($command->getEmail());
        $user->setPlainPassword($command->getPassword());
        $user->setFirstName($command->getFirstName());
        $user->setLastName($command->getLastName());

        $this->userRepository->add($user);
    }
}