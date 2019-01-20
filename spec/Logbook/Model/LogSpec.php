<?php

namespace spec\App\Logbook\Model;

use App\Logbook\Model\Log;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\Security\Model\User;

class LogSpec extends ObjectBehavior
{
    function let(User $user)
    {
        $this->beConstructedWith($user);

        $this->setProject('Symfony 101');
        $this->setText("Aujourd'hui, j'ai réussi à faire mes specs.");
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Log::class);
    }

    function it_has_a_project()
    {
        $this->getProject()->shouldReturn('Symfony 101');
    }

    function it_has_a_date()
    {
        $now = new \DateTimeImmutable;

        $date = $this->getDate();
        $date->format('Ymd His')->shouldBeLike($now->format('Ymd His'));
    }

    function it_has_a_user($user)
    {
        $this->getUser()->shouldReturn($user);
    }

    function it_has_a_text()
    {
        $this->getText()->shouldReturn("Aujourd'hui, j'ai réussi à faire mes specs.");
    }
}
