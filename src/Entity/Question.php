<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $details;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $points;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Evaluation", inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evaluation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Score", mappedBy="question", orphanRemoval=true)
     */
    private $scores;

    public function __construct(Evaluation $evaluation, string $title, string $details, float $points)
    {
        $this->evaluation = $evaluation;
        $this->title = $title;
        $this->details = $details;
        $this->points = $points;

        $this->scores = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDetails(): string
    {
        return $this->details;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function getEvaluation(): Evaluation
    {
        return $this->evaluation;
    }

    public function getScores(): Collection
    {
        return $this->scores;
    }
}
