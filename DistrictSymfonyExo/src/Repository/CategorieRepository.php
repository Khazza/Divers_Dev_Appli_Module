<?php

namespace App\Repository;

use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 *
 * @method Categorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorie[]    findAll()
 * @method Categorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class);
    }

/**
 * @return Categorie[]
 */
public function findRandomCategories(int $limit = 6): array
{
    // Obtenez le nombre total de catégories
    $count = $this->createQueryBuilder('c')
        ->select('COUNT(c)')
        ->getQuery()
        ->getSingleScalarResult();

    // Calculez un décalage aléatoire
    $offset = max(0, rand(0, $count - $limit));

    return $this->createQueryBuilder('c')
        ->setFirstResult($offset)
        ->setMaxResults($limit)
        ->getQuery()
        ->getResult();
}


}

