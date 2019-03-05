<?php

namespace App\Repository;

use App\Entity\VictoriousElephant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VictoriousElephant|null find($id, $lockMode = null, $lockVersion = null)
 * @method VictoriousElephant|null findOneBy(array $criteria, array $orderBy = null)
 * @method VictoriousElephant[]    findAll()
 * @method VictoriousElephant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VictoriousElephantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VictoriousElephant::class);
    }

    // /**
    //  * @return VictoriousElephant[] Returns an array of VictoriousElephant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VictoriousElephant
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
