<?php

namespace spec\App\Course\Model;

use App\Course\Model\Chapter;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ChapterSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            '# À propos de Symfony',
            'a-propos-de-symfony'
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Chapter::class);
    }

    function it_has_a_title()
    {
        $this->getTitle()->shouldReturn('À propos de Symfony');
    }

    function it_has_a_slug()
    {
        $this->getSlug()->shouldReturn('a-propos-de-symfony');
    }

    function it_has_a_content()
    {
        $this->getContent()->shouldReturn("<h1>À propos de Symfony</h1>");
    }
}
