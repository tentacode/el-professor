<?php

use Behat\Behat\Context\Context;

class FixtureContext implements Context
{
    /** @BeforeSuite */
    public static function resetFixture()
    {
        exec('make reset');
    }
}