<?php

namespace App\Repository;

use App\Entity\CurrencyHistory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CurrencyHistory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CurrencyHistory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CurrencyHistory[]    findAll()
 * @method CurrencyHistory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CurrencyHistoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CurrencyHistory::class);
    }

    // /**
    //  * @return CurrencyHistory[] Returns an array of CurrencyHistory objects
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
    public function findOneBySomeField($value): ?CurrencyHistory
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
