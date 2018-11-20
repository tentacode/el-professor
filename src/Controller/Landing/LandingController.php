<?php

namespace App\Controller\Landing;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Course\Query\FindAllCoursesQuery;

class LandingController extends AbstractController
{
    private $findAllCoursesQuery;

    public function __construct(FindAllCoursesQuery $findAllCoursesQuery)
    {
        $this->findAllCoursesQuery = $findAllCoursesQuery;
    }

    /**
     * @Route("/", name="landing")
     */
    public function __invoke()
    {
        $courses = $this->findAllCoursesQuery->__invoke();

        return $this->render('landing/landing.html.twig', [
            'courses' => $courses,
        ]);
    }
}
