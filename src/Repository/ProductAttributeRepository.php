<?php

namespace App\Repository;

use App\Entity\ProductAttributes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductAttributes|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductAttributes|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductAttributes[]    findAll()
 * @method ProductAttributes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductAttributeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductAttributes::class);
    }

    // /**
    //  * @return ProductAttribute[] Returns an array of ProductAttribute objects
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
    public function findOneBySomeField($value): ?ProductAttribute
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
