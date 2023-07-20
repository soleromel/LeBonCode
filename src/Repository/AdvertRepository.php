<?php

namespace App\Repository;

use App\Entity\Advert;
use App\Enum\AdvertFilter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Advert>
 *
 * @method Advert|null find($id, $lockMode = null, $lockVersion = null)
 * @method Advert|null findOneBy(array $criteria, array $orderBy = null)
 * @method Advert[]    findAll()
 * @method Advert[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Advert::class);
    }

    /**
     * @param array<mixed> $params
     * @return Advert[]
     */
    public function findByApiSearchParams(array $params): array
    {
        $qb = $this->createQueryBuilder('a');
        if (isset($params[AdvertFilter::TITLE])) {
            $qb->andWhere('a.title LIKE :title')
                ->setParameter('title', '%' . $params[AdvertFilter::TITLE] . '%');
        }
        if (isset($params[AdvertFilter::MIN_PRICE])) {
            $qb->andWhere('a.price >= :minPrice')
                ->setParameter('minPrice', $params[AdvertFilter::MIN_PRICE]);
        }
        if (isset($params[AdvertFilter::MAX_PRICE])) {
            $qb->andWhere('a.price <= :maxPrice')
                ->setParameter('maxPrice', $params[AdvertFilter::MAX_PRICE]);
        }
        return $qb->getQuery()->getResult();
    }
}
