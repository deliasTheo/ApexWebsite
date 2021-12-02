<?php

namespace App\Repository;

use App\Entity\Sauvetage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sauvetage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sauvetage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sauvetage[]    findAll()
 * @method Sauvetage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SauvetageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sauvetage::class);
    }

    // /**
    //  * @return Sauvetage[] Returns an array of Sauvetage objects
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
    public function findOneBySomeField($value): ?Sauvetage
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
