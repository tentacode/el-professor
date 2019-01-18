<?php declare(strict_types=1);

namespace App\Logbook\Query;

use Doctrine\ORM\EntityManagerInterface;
use App\Logbook\Model\Log;
use App\Security\Model\User;

class FindLogsByUser
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke(User $user): array
    {
        $repository = $this->em->getRepository(Log::class);

        return $repository->findByUser($user, ['date' => 'DESC']);
    }
}
