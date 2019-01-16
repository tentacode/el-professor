<?php

namespace App\Security\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use App\Security\Model\User;
use App\Security\Query\FindUserByEmail;
use App\Security\Query\SendMagicLink;

class MagicLink extends AbstractController
{
    private $findUserByEmail;
    private $sendMagicLink;

    public function __construct(
        FindUserByEmail $findUserByEmail,
        SendMagicLink $sendMagicLink
    ) {
        $this->findUserByEmail = $findUserByEmail;
        $this->sendMagicLink = $sendMagicLink;
    }

    /**
     * @Route("/magic-link", name="magic_link")
     */
    public function __invoke(Request $request): Response
    {
        // creates a task and gives it some dummy data for this example
        $form = $this->getMagicForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = $form->getData()->getEmail();

            $user = $this->findUserByEmail->__invoke($email);
            if (!$user) {
                $this->addFlash(
                    'magic_link_error',
                    "L'e-mail saisi est invalide."
                );
            } else {
                $this->sendMagicLink->__invoke($user);

                return $this->redirectToRoute('magic_link_success');
            }
        }
        
        return $this->render('security/magic_link_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/magic-link/success", name="magic_link_success")
     */
    public function success(): Response
    {
        return $this->render('security/magic_link_success.html.twig');
    }

    /**
     * @Route("/magic-link/failure", name="magic_link_failure")
     */
    public function failure(): Response
    {
        return $this->render('security/magic_link_failure.html.twig');
    }

    private function getMagicForm(): FormInterface
    {
        $user = new User();

        return $this->createFormBuilder($user)
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail',
                'attr' => [
                    'placeholder' => 'prenom.nom@ynov.com'
                ]
            ])
            ->getForm()
        ;
    }
}
