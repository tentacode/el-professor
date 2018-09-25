<?php declare(strict_types=1);

namespace App\Course\Query;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use App\Course\Model\Course;
use App\Course\Model\Chapter;

/**
 * @TODO This class job is ...
 */
class FindOneCourseQuery
{
    private $projectDirectory;
    private $finder;
    private $parsedown;

    public function __construct(string $projectDirectory)
    {
        $this->projectDirectory = $projectDirectory;
        $this->finder = new Finder;
        $this->parsedown = new \ParsedownExtra;
    }

    public function __invoke(string $slug): Course
    {
        $yaml = Yaml::parseFile(sprintf('%s/resources/courses.yaml', $this->projectDirectory));

        if (!isset($yaml['courses'][$slug])) {
            // @TODO custom CourseNotFoundException
            throw new \RuntimeException('No course with this slug.');
        }

        $courseYaml = $yaml['courses'][$slug];

        $course = new Course(
            $courseYaml['name'],
            $slug,
            $courseYaml['description'],
            $courseYaml['image']
        );

        $files = $this->finder->files()
            ->name('*.md')
            ->sortByName()
            ->depth('== 0')
            ->in(sprintf('%s/%s', $this->projectDirectory, $courseYaml['chapters']['directory']));
        ;

        foreach ($files as $file) {
            $chapterContent = $this->parsedown->text(file_get_contents($file->getRealPath()));

            $chapterTitle = $file->getBasename('.md');
            if (preg_match('/<h1>(.*)<\/h1>/', $chapterContent, $matches)) {
                $chapterTitle = $matches[1];
            }

            $course->addChapter(new Chapter(
                $chapterTitle,
                $file->getBasename('.md'),
                $chapterContent
            ));
        }

        return $course;
    }
}
