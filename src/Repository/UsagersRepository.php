<?php

namespace App\Repository;

use App\Entity\Usagers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Usagers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usagers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usagers[]    findAll()
 * @method Usagers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsagersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usagers::class);
    }

    // /**
    //  * @return Usagers[] Returns an array of Usagers objects
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
    public function findOneBySomeField($value): ?Usagers
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function getGravite()
    {
        return $this->createQueryBuilder('t')
            ->select('COUNT(t.id), t.grav')
            ->groupBy('t.grav')
            ->orderBy('t.grav')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getSexe()
    {
        return $this->createQueryBuilder('t')
            ->select('COUNT(t.id), t.sexe')
            ->groupBy('t.sexe')
            ->orderBy('t.sexe')
            ->getQuery()
            ->getResult()
        ;
    }

    public function getTypeTrajet()
    {
        return $this->createQueryBuilder('t')
            ->select('COUNT(t.id), t.trajet')
            ->groupBy('t.trajet')
            ->orderBy('t.trajet')
            ->where('t.trajet is not null')
            ->andWhere('t.trajet <> 0')
            ->andWhere('t.trajet <> 5')
            ->getQuery()
            ->getResult()
        ;
    }


}
