<?php

namespace App\Repository;

use App\Entity\ProductAttributeValues;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductAttributeValues|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductAttributeValues|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductAttributeValues[]    findAll()
 * @method ProductAttributeValues[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductAttributeValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductAttributeValues::class);
    }

    // /**
    //  * @return ProductAttributeValues[] Returns an array of ProductAttributeValues objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductAttributeValue
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
