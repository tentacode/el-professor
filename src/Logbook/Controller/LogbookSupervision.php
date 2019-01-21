<?php

namespace App\Logbook\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Logbook\Query\FindLogbookStudents;

class LogbookSupervision extends AbstractController
{
    private $findLogbookStudents;

    public function __construct(FindLogbookStudents $findLogbookStudents)
    {
        $this->findLogbookStudents = $findLogbookStudents;
    }

    /**
     * @Route("/supervision/journal-de-bord", name="logbook_supervision")
     */
    public function __invoke(Request $request): Response
    {
        $students = $this->findLogbookStudents->__invoke();

        return $this->render('logbook/logbook_supervision.html.twig', [
            'students' => $students,
        ]);
    }
}
