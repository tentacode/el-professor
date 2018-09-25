<?php

namespace spec\App\Course\Query;

use App\Course\Query\FindAllModulesQuery;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FindAllModulesQuerySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(FindAllModulesQuery::class);
    }
}
