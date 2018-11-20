<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;
use App\Entity\Module;
use App\Entity\Participation;
use App\Entity\Evaluation;
use App\Entity\Question;

class ElProfessorFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $em)
    {
        $professor = new User();
        $professor->setEmail('el.professor@lcdp.es');
        $professor->setPassword($this->encoder->encodePassword(
            $professor,
            'bellaciao'
        ));
        $professor->setRoles([
            User::ROLE_PROFESSOR,
        ]);
        $em->persist($professor);

        $student1 = new User();
        $student1->setEmail('berlin@lcdp.es');
        $student1->setPassword($this->encoder->encodePassword(
            $student1,
            'bellaciao'
        ));
        $student1->setRoles([
            User::ROLE_STUDENT,
        ]);
        $em->persist($student1);

        $student2 = new User();
        $student2->setEmail('tokyo@lcdp.es');
        $student2->setPassword($this->encoder->encodePassword(
            $student2,
            'bellaciao'
        ));
        $student2->setRoles([
            User::ROLE_STUDENT,
        ]);
        $em->persist($student2);

        $fakeModule = new Module('Les faux billets');
        $em->persist($fakeModule);

        $p1 = new Participation($fakeModule, $professor, [Participation::ROLE_TEACH]);
        $em->persist($p1);
        $p2 = new Participation($fakeModule, $student1, [Participation::ROLE_LEARN]);
        $em->persist($p2);
        $p3 = new Participation($fakeModule, $student2, [Participation::ROLE_LEARN]);
        $em->persist($p3);

        $evaluation = new Evaluation($fakeModule, 'Le dollar zimbabwéen');
        $em->persist($evaluation);

        $question1 = new Question(
            $evaluation,
            'Quel papier ?',
            'Quel type de papier est le meilleur pour faire des faux billets de dollar zimbabwéen ?',
            5
        );
        $em->persist($question1);

        $question2 = new Question(
            $evaluation,
            'Taux de change',
            "Quel est le taux de change dollar z / euros ? Combien de billet imprimer pour que cela soit rentable ?",
            10
        );
        $em->persist($question2);

        $em->flush();
    }
}
