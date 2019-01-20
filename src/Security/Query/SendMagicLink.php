<?php declare(strict_types=1);

namespace App\Security\Query;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface as Encoder;
use App\Security\Model\User;
use App\Security\Authentication\PasswordGenerator;
use Twig\Environment as Twig;

/**
 * @TODO This class job is ...
 */
class SendMagicLink
{
    private $em;
    private $passwordGenerator;
    private $encoder;
    private $mailer;
    private $twig;

    public function __construct(
        EntityManagerInterface $em,
        PasswordGenerator $passwordGenerator,
        Encoder $encoder,
        \Swift_Mailer $mailer,
        Twig $twig
    ) {
        $this->em = $em;
        $this->passwordGenerator = $passwordGenerator;
        $this->encoder = $encoder;
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function __invoke(User $user): void
    {
        $plainPassword = $this->passwordGenerator->generate();

        $encodedPassword = $this->encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encodedPassword);
        $user->setLastTokenDate(new \DateTime());

        $this->em->persist($user);
        $this->em->flush();

        $message = new \Swift_Message('✨ Votre lien magique');
        $message
            ->setFrom('contact@gabrielpillet.com')
            ->setTo($user->getEmail())
            ->setBody(
                $this->twig->render('security/email/magic_link_email.html.twig', [
                    'uid' => $user->getUid(),
                    'token' => $plainPassword
                ]),
                'text/html'
            )
        ;

        $this->mailer->send($message);
    }
}
