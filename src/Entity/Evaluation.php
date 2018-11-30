<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvaluationRepository")
 */
class Evaluation
{
    const DEFAULT_TOTAL_POINTS = 20;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Module", inversedBy="evaluations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $module;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="evaluation", orphanRemoval=true)
     */
    private $questions;

    public function __construct(Module $module, string $name)
    {
        $this->module = $module;
        $this->name = $name;
        $this->questions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getModule(): Module
    {
        return $this->module;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestions(): Collection
    {
        return $this->questions;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->questions->contains($question)) {
            $this->questions[] = $question;
            $question->setEvaluation($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->questions->contains($question)) {
            $this->questions->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getEvaluation() === $this) {
                $question->setEvaluation(null);
            }
        }

        return $this;
    }

    public function getStudents(): array
    {
        $participations = $this->getModule()->getParticipations()->toArray();
        $studentParticipations = array_filter($participations, function (Participation $participation): bool {
            return in_array(Participation::ROLE_LEARN, $participation->getRoles());
        });

        return array_map(function (Participation $participation): User {
            return $participation->getUser();
        }, $studentParticipations);
    }

    public function getScores(): array
    {
        $scores = [];

        foreach ($this->questions as $question) {
            $scores = array_merge($scores, $question->getScores()->toArray());
        }
        
        return $scores;
    }

    public function getTotalPoints(): int
    {
        return self::DEFAULT_TOTAL_POINTS;
    }

    public function getStudentScore(User $student): float
    {
        // $studentScores = $this->
        return 10;
    }

    public function studentHasBeenEvaluated(User $student): bool
    {
        $studentScores = array_filter($this->getScores(), function ($score) use ($student) {

        });
    }

    public function getMean(): float
    {

        return 10.0;
    }

    public function getCompletion(): float
    {
        $totalStudents = count($this->getStudents());
        $totalQuestions = count($this->getQuestions());

        $goal = $totalStudents * $totalQuestions;

        return count($this->getScores()) / $goal * 100;
    }
}
