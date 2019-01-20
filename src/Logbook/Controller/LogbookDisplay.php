<?php

namespace App\Logbook\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Logbook\Model\Log;
use App\Logbook\Form\NewLogType;
use App\Logbook\Query\FindLogsByUser;

class LogbookDisplay extends AbstractController
{
    private $findLogsByUser;

    public function __construct(FindLogsByUser $findLogsByUser)
    {
        $this->findLogsByUser = $findLogsByUser;
    }

    /**
     * @Route("/journal-de-bord", name="logbook_display")
     * @Route("/jdb", name="logbook_display_short")
     */
    public function __invoke(Request $request): Response
    {
        $user = $this->getUser();
        $logs = $this->findLogsByUser->__invoke($user);

        $form = $this->createForm(NewLogType::class, new Log($user));
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $newLog = $form->getData();

            $file = $newLog->getMediaFile();
            if ($file) {
                $fileName = sprintf(
                    'logbook_%s.%s',
                    uniqid(),
                    $file->guessExtension()
                );
    
                $file->move(
                    $this->getParameter('logbook_upload_directory'),
                    $fileName
                );
    
                $newLog->setMedia($fileName);
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($newLog);
            $em->flush();

            return $this->redirect($this->generateUrl('logbook_display'));
        }

        return $this->render('logbook/logbook_display.html.twig', [
            'logs' => $logs,
            'form' => $form->createView(),
        ]);
    }
}
