<?php

namespace App\Security\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class User implements UserInterface
{
    const TOKEN_EXPIRATION = '-1 hour';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=36, unique=true)
     */
    private $uid;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $roles = [];

    /**
     * @var string The hashed password, also the passwordless token
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var \DateTimeImmutable The hashed password
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $lastTokenDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUid(string $uid)
    {
        $this->uid = $uid;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

    public function setLastTokenDate(\DateTimeImmutable $lastTokenDate): void
    {
        $this->lastTokenDate = $lastTokenDate;
    }

    public function hasTokenExpired(): bool
    {
        $maxTokenDate = new \DateTimeImmutable(self::TOKEN_EXPIRATION);

        return $maxTokenDate->getTimestamp() > $this->lastTokenDate->getTimestamp();
    }
}
