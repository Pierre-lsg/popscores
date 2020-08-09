<?php

namespace App\Repository;

use App\Entity\CompetitionRankTeam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompetitionRankTeam|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompetitionRankTeam|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompetitionRankTeam[]    findAll()
 * @method CompetitionRankTeam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompetitionRankTeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompetitionRankTeam::class);
    }

    // /**
    //  * @return CompetitionRankTeam[] Returns an array of CompetitionRankTeam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CompetitionRankTeam
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
