<?php declare(strict_types=1);

namespace App\Course\Model;

/**
 * This model object represent a course
 */
class Course
{
    private $name;
    private $slug;
    private $description;
    private $image;
    private $chapters;

    public function __construct(
        string $name,
        string $slug,
        string $description,
        string $image
    ) {
        $this->chapters = [];

        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->image = $image;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getChapters(): array
    {
        return $this->chapters;
    }

    public function addChapter(Chapter $chapter): void
    {
        $this->chapters[] = $chapter;
    }
}
