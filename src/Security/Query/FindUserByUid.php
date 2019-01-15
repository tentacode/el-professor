<?php declare(strict_types=1);

namespace App\Security\Query;

use Doctrine\ORM\EntityManagerInterface;
use App\Security\Model\User;

/**
 * @TODO This class job is ...
 */
class FindUserByUid
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(string $uid): ?User
    {
        $repository = $this->em->getRepository(User::class);

        return $repository->findOneByUid($uid);
    }
}
