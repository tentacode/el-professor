<?php declare(strict_types=1);

namespace App\Course\Model;

/**
 * This model object represent a course's chapter
 */
class Chapter
{
    private $title;
    private $slug;
    private $content;

    public function __construct(string $title, string $slug, string $content)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->content = $content;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
