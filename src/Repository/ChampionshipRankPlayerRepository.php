<?php

namespace App\Repository;

use App\Entity\ChampionshipRankPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChampionshipRankPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampionshipRankPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampionshipRankPlayer[]    findAll()
 * @method ChampionshipRankPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampionshipRankPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampionshipRankPlayer::class);
    }

    // /**
    //  * @return ChampionshipRankPlayer[] Returns an array of ChampionshipRankPlayer objects
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
    public function findOneBySomeField($value): ?ChampionshipRankPlayer
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
