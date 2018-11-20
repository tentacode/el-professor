<?php

namespace App\Controller\Professor;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EvaluationRepository;

class EvaluationDetailController extends AbstractController
{
    private $evaluationRepository;

    public function __construct(EvaluationRepository $evaluationRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
    }

    /**
     * @Route("/professor/evaluation/{evaluationId}", name="professor_evaluation_detail")
     */
    public function __invoke(int $evaluationId)
    {
        $evaluation = $this->evaluationRepository->findOneByIdAndTeacher($evaluationId, $this->getUser());

        return $this->render('professor/evaluation_detail.html.twig', [
            'evaluation' => $evaluation,
        ]);
    }
}
