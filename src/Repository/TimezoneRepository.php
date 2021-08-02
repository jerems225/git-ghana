<?php

namespace App\Repository;

use App\Entity\Timezone;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Timezone|null find($id, $lockMode = null, $lockVersion = null)
 * @method Timezone|null findOneBy(array $criteria, array $orderBy = null)
 * @method Timezone[]    findAll()
 * @method Timezone[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimezoneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Timezone::class);
    }

    // /**
    //  * @return Timezone[] Returns an array of Timezone objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Timezone
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
