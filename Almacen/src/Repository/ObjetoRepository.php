<?php

namespace App\Repository;

use App\Entity\Objeto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Objeto>
 *
 * @method Objeto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Objeto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Objeto[]    findAll()
 * @method Objeto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjetoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Objeto::class);
    }

    public function save(Objeto $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Objeto $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOrderUbicacion(): array
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.ubicacion', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Objeto[] Returns an array of Objeto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Objeto
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
