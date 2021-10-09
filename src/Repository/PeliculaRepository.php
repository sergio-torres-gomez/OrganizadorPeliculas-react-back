<?php

namespace App\Repository;

use App\Entity\Pelicula;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pelicula|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pelicula|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pelicula[]    findAll()
 * @method Pelicula[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeliculaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pelicula::class);
    }

    /**
     * @return Pelicula[] Returns an array of Pelicula objects
     */

    public function findByUsuario($value): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.peliculasUsuarios', 'pu')
            ->andWhere('pu.usuario = :val')
            ->setParameter('val', $value)
            //->orderBy('orden', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

}
