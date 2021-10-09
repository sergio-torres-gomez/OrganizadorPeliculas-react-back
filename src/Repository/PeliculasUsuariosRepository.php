<?php

namespace App\Repository;

use App\Entity\PeliculasUsuarios;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PeliculasUsuarios|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeliculasUsuarios|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeliculasUsuarios[]    findAll()
 * @method PeliculasUsuarios[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeliculasUsuariosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeliculasUsuarios::class);
    }

    // /**
    //  * @return PeliculasUsuarios[] Returns an array of PeliculasUsuarios objects
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
    public function findOneBySomeField($value): ?PeliculasUsuarios
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
