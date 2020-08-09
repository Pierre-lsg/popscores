<?php

namespace App\Repository;

use App\Entity\ChampionshipRankClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChampionshipRankClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampionshipRankClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampionshipRankClub[]    findAll()
 * @method ChampionshipRankClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampionshipRankClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampionshipRankClub::class);
    }

    // /**
    //  * @return ChampionshipRankClub[] Returns an array of ChampionshipRankClub objects
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
    public function findOneBySomeField($value): ?ChampionshipRankClub
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
