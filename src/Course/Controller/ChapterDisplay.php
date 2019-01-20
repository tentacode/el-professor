<?php

namespace App\Course\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Course\Query\FindOneCourseQuery;

class ChapterDisplay extends AbstractController
{
    private $findOneCourseQuery;

    public function __construct(FindOneCourseQuery $findOneCourseQuery)
    {
        $this->findOneCourseQuery = $findOneCourseQuery;
    }

    /**
     * @Route("/course/{courseSlug}/{chapterSlug}", name="chapter_detail")
     */
    public function __invoke(string $courseSlug, ?string $chapterSlug = null)
    {
        $course = $this->findOneCourseQuery->__invoke($courseSlug);

        $chapter = null;
        if ($chapterSlug === null) {
            $chapter = $course->getChapters()[0];
        } else {
            foreach ($course->getChapters() as $courseChapter) {
                if ($courseChapter->getSlug() === $chapterSlug) {
                    $chapter = $courseChapter;
                    break;
                }
            }
        }

        return $this->render('course/chapter_detail.html.twig', [
            'course' => $course,
            'chapter' => $chapter,
        ]);
    }
}
