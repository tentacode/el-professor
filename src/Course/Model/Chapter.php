<?php declare(strict_types=1);

namespace App\Course\Model;

/**
 * This model object represent a course's chapter
 */
class Chapter
{
    private $parsedown;
    private $title;
    private $slug;
    private $markdown;

    public function __construct(string $markdown, string $slug)
    {
        $this->parsedown = new \ParsedownExtra;

        $this->title = $slug;
        if (preg_match('/^#([^#\n]+)/m', $markdown, $matches)) {
            $this->title = $matches[1];
        }

        $this->markdown = $markdown;
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

    public function getContent(): string
    {
        return $this->toHtml();
    }

    public function getSubChapters(): array
    {
        $subChapters = [];
        if (preg_match_all('/^##([^#\n]+)/m', $this->markdown, $matches)) {
            foreach ($matches[1] as $match) {
                $subChapters[] = new SubChapter(
                    $match,
                    $this->slugify($match)
                );
            }
        }

        return $subChapters;
    }

    private function toHtml(): string
    {
        $html = $this->parsedown->text($this->markdown);

        $html = preg_replace_callback(
            '#<h2>([^<]+)</h2>#',
            function ($matches) {
                return sprintf(
                    '<h2 id="%s">%s</h2>',
                    $this->slugify($matches[1]),
                    $matches[1]
                );
            },
            $html
        );

        $html = preg_replace(
            '/<table>/',
            '<table class="table table-borderless table-hover table-dark table-striped ">',
            $html
        );

        return $html;
    }

    private function slugify($string): string
    {
        return strtolower(preg_replace('/[^A-Za-z]/', '-', trim($string)));
    }
}
