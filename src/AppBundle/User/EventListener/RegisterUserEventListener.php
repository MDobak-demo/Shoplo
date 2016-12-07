<?php

namespace AppBundle\User\EventListener;

use AppBundle\User\Model\User;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class RegisterUserEventListener
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class RegisterUserEventListener
{
    /**
     * @var UserPasswordEncoderInterface
     */
    protected $encoder;
    
    /**
     * Constructor
     * 
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    /**
     * @param LifecycleEventArgs $event
     */
    public function prePersist(LifecycleEventArgs $event)
    {
        $object = $event->getObject();

        if ($object instanceof User) {
            $this->encodePassword($object);
        }
    }

    /**
     * @param LifecycleEventArgs $event
     */
    public function preUpdate(LifecycleEventArgs $event)
    {
        $object = $event->getObject();

        if ($object instanceof User) {
            $this->encodePassword($object);
        }
    }

    /**
     * @param User $user
     */
    public function encodePassword(User $user)
    {
        if ($user->getPlainPassword()) {
            $user->setPassword($this->encoder->encodePassword($user, $user->getPlainPassword()));
        }
    }
}