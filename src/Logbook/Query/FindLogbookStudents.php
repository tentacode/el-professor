<?php declare(strict_types=1);

namespace App\Logbook\Query;

use Doctrine\ORM\EntityManagerInterface;
use App\Logbook\Model\Log;
use App\Security\Model\User;

class FindLogbookStudents
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(): array
    {
        $repository = $this->em->getRepository(User::class);

        $queryBuilder = $repository->createQueryBuilder('u')
            ->leftJoin('u.logbookLogs', 'll')
            ->where('u.roles LIKE :role_logbook')
            ->setParameter('role_logbook', '%ROLE_LOGBOOK%')
            ->orderBy('u.firstname', 'ASC')
            ->addOrderBy('u.lastname', 'ASC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}
