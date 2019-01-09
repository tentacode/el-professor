<?php declare(strict_types=1);

namespace App\Course\Query;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use App\Course\Model\Course;
use App\Course\Model\Chapter;

/**
 * @TODO This class job is ...
 */
class FindAllCoursesQuery
{
    private $projectDirectory;
    private $finder;
    private $parsedown;

    public function __construct(string $projectDirectory)
    {
        $this->projectDirectory = $projectDirectory;
        $this->finder = new Finder;
    }

    public function __invoke(): array
    {
        $yaml = Yaml::parseFile(sprintf('%s/resources/courses.yaml', $this->projectDirectory));

        $courses = [];
        foreach ($yaml['courses'] as $courseSlug => $courseYaml) {
            $course = new Course(
                $courseYaml['name'],
                $courseSlug,
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
                $markdownFilepath = $file->getRealPath();
                $markdown = file_get_contents($markdownFilepath);
                
                if (false === $markdown) {
                    throw new \RuntimeException('Could not read markdown file "%s".', $markdownFilepath);
                }

                if (empty($markdown)) {
                    throw new \RuntimeException('Markdown file "%s" is empty.', $markdownFilepath);
                }
    
                $course->addChapter(new Chapter(
                    $markdown,
                    $file->getBasename('.md')
                ));
            }

            $courses[] = $course;
        }

        return $courses;
    }
}
