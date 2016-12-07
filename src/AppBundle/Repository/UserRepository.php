<?php

namespace AppBundle\Repository;

use AppBundle\Repository\Exception\EntityNotFoundException;
use AppBundle\User\Model\User;
use AppBundle\User\Model\UserId;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class UserRepository
 */
class UserRepository
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var EntityRepository
     */
    protected $doctrineRepository;

    /**
     * CommentRepository constructor.
     *
     * @param EntityManager    $entityManager
     * @param EntityRepository $doctrineRepository
     */
    public function __construct(EntityManager $entityManager, EntityRepository $doctrineRepository)
    {
        $this->entityManager      = $entityManager;
        $this->doctrineRepository = $doctrineRepository;
    }

    /**
     * @param UserId $id
     *
     * @return User|null
     */
    public function find(UserId $id): User
    {
        /** @var User $user */
        $user = $this->doctrineRepository->find($id->toString());

        if (!$user) {
            throw EntityNotFoundException::create();
        }

        return $user;
    }

    /**
     * @param User $user
     */
    public function add(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush($user);
    }
}