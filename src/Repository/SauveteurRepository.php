<?php

namespace App\Repository;

use App\Entity\Sauveteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sauveteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sauveteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sauveteur[]    findAll()
 * @method Sauveteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SauveteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sauveteur::class);
    }

    // /**
    //  * @return Sauveteur[] Returns an array of Sauveteur objects
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
    public function findOneBySomeField($value): ?Sauveteur
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
