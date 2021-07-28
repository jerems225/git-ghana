<?php

namespace App\Repository;

use App\Entity\Useraccountactivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Useraccountactivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Useraccountactivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Useraccountactivity[]    findAll()
 * @method Useraccountactivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UseraccountactivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Useraccountactivity::class);
    }

    // /**
    //  * @return Useraccountactivity[] Returns an array of Useraccountactivity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Useraccountactivity
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
