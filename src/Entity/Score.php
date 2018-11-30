<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRepository")
 */
class Score
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="scores")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $percentage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    public function __construct(User $user, Question $question, float $percentage, ?string $comment = null)
    {
        $this->user = $user;
        $this->question = $question;
        $this->percentage = $percentage;
        $this->comment = $comment;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function getPercentage()
    {
        return $this->percentage;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
}
