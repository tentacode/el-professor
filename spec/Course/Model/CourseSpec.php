<?php

namespace spec\App\Course\Model;

use App\Course\Model\Course;
use App\Course\Model\Chapter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CourseSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            'Symfony 4',
            'symfony-4',
            "C'est cool Symfony",
            '/img/symfony.png'
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Course::class);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('Symfony 4');
    }

    function it_has_a_slug()
    {
        $this->getSlug()->shouldReturn('symfony-4');
    }

    function it_has_a_description()
    {
        $this->getDescription()->shouldReturn("C'est cool Symfony");
    }

    function it_has_an_image()
    {
        $this->getImage()->shouldReturn('/img/symfony.png');
    }

    function it_can_have_chapters(Chapter $chapter)
    {
        $this->getChapters()->shouldReturn([]);

        $this->addChapter($chapter);
        $this->getChapters()->shouldReturn([
            $chapter,
        ]);
    }
}
