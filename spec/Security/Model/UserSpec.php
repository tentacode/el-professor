<?php

namespace spec\App\Security\Model;

use App\Security\Model\User;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }

    function it_has_a_unique_id()
    {
        $this->setUid('1234');

        $this->getUid()->shouldReturn('1234');
    }

    function it_tells_if_token_is_expired()
    {
        $this->setLastTokenDate(new \DateTimeImmutable('-59 minutes'));
        $this->hasTokenExpired()->shouldReturn(false);

        $this->setLastTokenDate(new \DateTimeImmutable('-1 hour -1 minute'));
        $this->hasTokenExpired()->shouldReturn(true);
    }
}
