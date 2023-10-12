<?php

namespace App\Repository;

use App\Entity\Plat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Plat>
 *
 * @method Plat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plat[]    findAll()
 * @method Plat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plat::class);
    }

/**
 * @return Plat[]
 */
public function findRandomPlats(int $limit = 3): array
{
    // Obtenez le nombre total de plats
    $count = $this->createQueryBuilder('p')
        ->select('COUNT(p)')
        ->getQuery()
        ->getSingleScalarResult();

    // Calculez un décalage aléatoire
    $offset = max(0, rand(0, $count - $limit));

    return $this->createQueryBuilder('p')
        ->setFirstResult($offset)
        ->setMaxResults($limit)
        ->getQuery()
        ->getResult();
}


}
