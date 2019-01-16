<?php

namespace App\Security\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface as Encoder;
use App\Security\Model\User;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(Encoder $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $adminUser = new User();
        $adminUser->setEmail('contact@gabrielpillet.com');
        $adminUser->setRoles(['ROLE_ADMIN']);
        $adminUser->setUid('uid-1234');
        $adminUser->setPassword($this->encoder->encodePassword($adminUser, 'token-1234'));
        $adminUser->setLastTokenDate(new \DateTimeImmutable());

        $manager->persist($adminUser);

        $manager->flush();
    }
}
