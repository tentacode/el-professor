<?php

namespace App\Security\Activity;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Security\Model\User;

class ActivityListener
{
    private $em;
    private $tokenStorage;

    public function __construct(EntityManagerInterface $em, TokenStorageInterface $tokenStorage)
    {
        $this->em = $em;
        $this->tokenStorage = $tokenStorage;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        if (!$token = $this->tokenStorage->getToken()) {
            return;
        }
        
        $user = $token->getUser();
        if (!$user instanceof User) {
            return;
        }

        $user->setLastActivityDate(new \DateTime);

        $this->em->persist($user);
        $this->em->flush($user);
    }
}
