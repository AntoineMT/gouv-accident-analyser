<?php

namespace App\Repository;

use App\Entity\Accidents;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Accidents|null find($id, $lockMode = null, $lockVersion = null)
 * @method Accidents|null findOneBy(array $criteria, array $orderBy = null)
 * @method Accidents[]    findAll()
 * @method Accidents[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccidentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Accidents::class);
    }

    public function getStatistiquesAnnées()
    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;


        return $this->createQueryBuilder('t')
            ->select('COUNT(t.id), t.annee')
            ->groupBy('t.annee')
            ->getQuery()
            ->getResult()
        ;

    }

    /*
    public function findOneBySomeField($value): ?Accidents
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
