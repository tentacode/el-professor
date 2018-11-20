<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipationRepository")
 */
class Participation
{
    const ROLE_TEACH = 'teach';
    const ROLE_LEARN = 'learn';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Module", inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $module;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="participations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $roles = [];

    public function __construct(Module $module, User $user, array $roles)
    {
        $this->module = $module;
        $this->user = $user;
        $this->roles = $roles;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModule(): Module
    {
        return $this->module;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }
}
