<?php

namespace AppBundle\User\Model;

use AppBundle\Common\Model\ModifiedTimeTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class User
 *
 * @ORM\Entity
 * @ORM\Table(uniqueConstraints={@ORM\UniqueConstraint(name="user_unique",columns={"email"})})
 * @ORM\HasLifecycleCallbacks
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class User implements UserInterface
{
    use ModifiedTimeTrait;

    /**
     * @var UserId
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="user_id")
     */
    protected $id;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = 8
     * )
     */
    protected $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=true)
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    protected $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    protected $active = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_blocked", type="boolean", nullable=false)
     */
    protected $blocked = false;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    protected $lastLogin;

    /**
     * @var integer
     *
     * @ORM\Column(name="confirmation_token", type="text", nullable=true)
     */
    protected $confirmationToken = 0;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->id = new UserId();
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

    /**
     * @param UserId $id
     *
     * @return User
     */
    public function setId(UserId $id): User
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     *
     * @return User
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isBlocked()
    {
        return $this->blocked;
    }

    /**
     * @param boolean $blocked
     *
     * @return User
     */
    public function setBlocked($blocked)
    {
        $this->blocked = $blocked;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime $lastLogin
     *
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * @return int
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * @param int $confirmationToken
     *
     * @return User
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        $this->password      = null;
        $this->plainPassword = null;
    }
}
