<?php

namespace App\Controller\Professor;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ModuleRepository;

class ModuleListController extends AbstractController
{
    private $moduleRepository;

    public function __construct(ModuleRepository $moduleRepository)
    {
        $this->moduleRepository = $moduleRepository;
    }

    /**
     * @Route("/professor/modules", name="professor_module_list")
     */
    public function __invoke()
    {
        $modules = $this->moduleRepository->findByTeacher($this->getUser());

        return $this->render('professor/module_list.html.twig', [
            'modules' => $modules,
        ]);
    }
}
