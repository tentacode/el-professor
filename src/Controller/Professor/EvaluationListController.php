<?php

namespace App\Controller\Professor;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvaluationRepository;
use App\Repository\ModuleRepository;

class EvaluationListController extends AbstractController
{
    private $evaluationRepository;
    private $moduleRepository;

    public function __construct(EvaluationRepository $evaluationRepository, ModuleRepository $moduleRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * @Route("/professor/module/{moduleId}/evaluations", name="professor_evaluation_list")
     */
    public function __invoke(int $moduleId)
    {
        $module = $this->moduleRepository->find($moduleId);
        $evaluations = $this->evaluationRepository->findByTeacherAndModule($this->getUser(), $module);

        return $this->render('professor/evaluation_list.html.twig', [
            'module' => $module,
            'evaluations' => $evaluations,
        ]);
    }
}
