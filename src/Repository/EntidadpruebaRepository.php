<?php

namespace App\Repository;

use App\Entity\Entidadprueba;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entidadprueba>
 *
 * @method Entidadprueba|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entidadprueba|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entidadprueba[]    findAll()
 * @method Entidadprueba[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntidadpruebaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entidadprueba::class);
    }

//    /**
//     * @return Entidadprueba[] Returns an array of Entidadprueba objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Entidadprueba
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
