<?php

use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Behat\Tester\Exception\PendingException;

class SecurityContext extends RawMinkContext
{
   /**
    * @Given I am logged in with :user
    */
    public function iAmLoggedInWithBerlin($user)
    {
        $this->getSession()->visit($this->locatePath(sprintf(
            '/?pl_token=token-%s&pl_uid=uid-%s',
            $user,
            $user
        )));
    }
}
