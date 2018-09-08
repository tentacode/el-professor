<?php

namespace App\Controller\Landing;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LandingController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function __invoke()
    {
        return $this->render('landing/landing.html.twig');
    }
}