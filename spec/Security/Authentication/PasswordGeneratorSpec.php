<?php

namespace spec\App\Security\Authentication;

use App\Security\Authentication\PasswordGenerator;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PasswordGeneratorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PasswordGenerator::class);
    }

    function it_generates_a_random_password()
    {
        $password = $this->generate();

        $password->shouldMatch('/^[^ ]{30}$/');
    }
}
