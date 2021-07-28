<?php

namespace App\Repository;

use App\Entity\Userlogin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Userlogin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Userlogin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Userlogin[]    findAll()
 * @method Userlogin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserloginRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Userlogin::class);
    }

    // /**
    //  * @return Userlogin[] Returns an array of Userlogin objects
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
    public function findOneBySomeField($value): ?Userlogin
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
