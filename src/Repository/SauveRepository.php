<?php

namespace App\Repository;

use App\Entity\Sauve;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sauve|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sauve|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sauve[]    findAll()
 * @method Sauve[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SauveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sauve::class);
    }

    // /**
    //  * @return Sauve[] Returns an array of Sauve objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sauve
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
