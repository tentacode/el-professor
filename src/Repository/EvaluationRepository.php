<?php

namespace App\Repository;

use App\Entity\Evaluation;
use App\Entity\User;
use App\Entity\Module;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Evaluation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evaluation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evaluation[]    findAll()
 * @method Evaluation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvaluationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Evaluation::class);
    }

    public function findOneByIdAndTeacher(int $evaluationId, User $teacher): Evaluation
    {
        return $this->createQueryBuilder('e')
            ->join('e.module', 'm')
            ->join('m.participations', 'p') // @TODO filter by role teach
            ->where('e.id = :evaluationId')
            ->setParameter('evaluationId', $evaluationId)
            ->andWhere('p.user = :teacher')
            ->setParameter('teacher', $teacher)
            ->getQuery()
            ->getSingleResult()
        ;
    }

    public function findByTeacherAndModule(User $teacher, Module $module)
    {
        return $this->createQueryBuilder('e')
            ->join('e.module', 'm', 'WITH', 'm.id = :moduleId')
            ->setParameter('moduleId', $module->getId())
            ->join('m.participations', 'p') // @TODO filter by role teach
            ->where('p.user = :teacher')
            ->setParameter('teacher', $teacher)
            ->getQuery()
            ->getResult()
        ;
    }
}
