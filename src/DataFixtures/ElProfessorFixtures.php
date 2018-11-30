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
use App\Entity\Score;

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

        $studentBerlin = new User();
        $studentBerlin->setEmail('berlin@lcdp.es');
        $studentBerlin->setPassword($this->encoder->encodePassword(
            $studentBerlin,
            'bellaciao'
        ));
        $studentBerlin->setRoles([
            User::ROLE_STUDENT,
        ]);
        $em->persist($studentBerlin);

        $studentTokyo = new User();
        $studentTokyo->setEmail('tokyo@lcdp.es');
        $studentTokyo->setPassword($this->encoder->encodePassword(
            $studentTokyo,
            'bellaciao'
        ));
        $studentTokyo->setRoles([
            User::ROLE_STUDENT,
        ]);
        $em->persist($studentTokyo);

        $studentDenver = new User();
        $studentDenver->setEmail('denver@lcdp.es');
        $studentDenver->setPassword($this->encoder->encodePassword(
            $studentDenver,
            'bellaciao'
        ));
        $studentDenver->setRoles([
            User::ROLE_STUDENT,
        ]);
        $em->persist($studentDenver);

        $fakeModule = new Module('Les faux billets');
        $em->persist($fakeModule);

        $p1 = new Participation($fakeModule, $professor, [Participation::ROLE_TEACH]);
        $em->persist($p1);
        $p2 = new Participation($fakeModule, $studentBerlin, [Participation::ROLE_LEARN]);
        $em->persist($p2);
        $p3 = new Participation($fakeModule, $studentTokyo, [Participation::ROLE_LEARN]);
        $em->persist($p3);
        $p3 = new Participation($fakeModule, $studentDenver, [Participation::ROLE_LEARN]);
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

        $scoreBerlinQuestion1 = new Score($studentBerlin, $question1, 100);
        $em->persist($scoreBerlinQuestion1);
        $scoreBerlinQuestion2 = new Score($studentBerlin, $question2, 100);
        $em->persist($scoreBerlinQuestion2);

        $scoreTokyoQuestion1 = new Score($studentTokyo, $question1, 50, 'Nul.');
        $em->persist($scoreTokyoQuestion1);
        $scoreTokyoQuestion2 = new Score($studentTokyo, $question2, 0, 'Non.');
        $em->persist($scoreTokyoQuestion2);

        $em->flush();
    }
}
