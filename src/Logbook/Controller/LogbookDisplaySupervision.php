<?php

namespace App\Logbook\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Logbook\Model\Log;
use App\Logbook\Form\NewLogType;
use App\Logbook\Query\FindLogsByUser;
use App\Security\Query\FindUserByUid;

class LogbookDisplaySupervision extends AbstractController
{
    private $findUserByUid;
    private $findLogsByUser;

    public function __construct(FindUserByUid $findUserByUid, FindLogsByUser $findLogsByUser)
    {
        $this->findUserByUid = $findUserByUid;
        $this->findLogsByUser = $findLogsByUser;
    }

    /**
     * @Route("/supervision/jdb/{uid}", name="logbook_display_supervision")
     */
    public function supervision(Request $request, string $uid): Response
    {
        $student = $this->findUserByUid->__invoke($uid);
        $logs = $this->findLogsByUser->__invoke($student);

        return $this->render('logbook/logbook_display_supervision.html.twig', [
            'student' => $student,
            'logs' => $logs,
        ]);
    }
}
