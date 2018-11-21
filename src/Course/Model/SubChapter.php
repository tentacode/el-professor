<?php declare(strict_types=1);

namespace App\Course\Model;

/**
 * This model object represent a chapter's sub chapter
 */
class SubChapter
{
    private $title;
    private $slug;

    public function __construct(string $title, string $slug)
    {
        $this->title = $title;
        $this->slug = $slug;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}
