<?php

namespace App\Repository;

use App\Entity\PeopleRoleInMovie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PeopleRoleInMovie>
 *
 * @method PeopleRoleInMovie|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeopleRoleInMovie|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeopleRoleInMovie[]    findAll()
 * @method PeopleRoleInMovie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeopleRoleInMovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeopleRoleInMovie::class);
    }

    public function add(PeopleRoleInMovie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PeopleRoleInMovie $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PeopleRoleInMovie[] Returns an array of PeopleRoleInMovie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PeopleRoleInMovie
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
