<?php

namespace App\Repository;

use App\Entity\Usager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usager|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usager|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usager[]    findAll()
 * @method Usager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usager::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Usager $entity, bool $flush = true): void
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
    public function remove(Usager $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
}
