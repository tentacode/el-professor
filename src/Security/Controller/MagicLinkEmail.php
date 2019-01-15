<?php

namespace App\Security\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MagicLinkEmail extends AbstractController
{
    /**
     * @Route("/magic-link/email/{uid}/{token}", name="magic_link_email")
     */
    public function __invoke(string $uid, string $token): Response
    {
        return $this->render('security/email/magic_link_email.html.twig', [
            'uid' => $uid,
            'token' => $token,
        ]);
    }
}
