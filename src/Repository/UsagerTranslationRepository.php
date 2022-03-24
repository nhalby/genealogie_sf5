<?php

namespace App\Repository;

use App\Entity\UsagerTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsagerTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsagerTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsagerTranslation[]    findAll()
 * @method UsagerTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsagerTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsagerTranslation::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(UsagerTranslation $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(UsagerTranslation $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
