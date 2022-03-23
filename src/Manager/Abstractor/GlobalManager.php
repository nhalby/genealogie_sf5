<?php

namespace App\Manager\Abstractor;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;
use Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper;

class GlobalManager{
  private $entityManager;
  private $repository;

  /**
   * GlobalManager constructor.
   *
   * @param ObjectManager    $objectManager
   * @param ObjectRepository $repository
   */
  public function __construct(ObjectManager $objectManager, ObjectRepository $repository){
    $this->entityManager = $objectManager;
    $this->repository    = $repository;
  }

  /**
   * Methode pour recuperer un entity
   *
   * @param int $entityId
   * @return object
   */
  public function get(int $entityId){
    return $this->repository->find($entityId);
  }

  /**
   * Methode pour recuperer un entity
   *
   * @param int $entityId
   * @return object
   */
  public function getOneBy(array $criteria, array $orderBy = null){
    return $this->repository->findOneBy($criteria, $orderBy);
  }

  /**
   * Récupère plusieurs entités en fonction de paramètres
   *
   * @param array      $criteria
   * @param array|null $orderBy
   * @param null       $limit
   * @param null       $offset
   * @param bool       $includeDeleted
   * @return \object[]
   */
  public function getBy(array $criteria, array $orderBy = null, $limit = null, $offset = null, $includeDeleted = false){
    return $this->repository->findBy($criteria, $orderBy, $limit, $offset, $includeDeleted);
  }

  /**
   * Methode pour récuperer toutes les entitées
   *
   * @param array $orderBy
   * @param bool  $includeDeleted
   * @return int|object[]
   */
  public function getAll(){
    return $this->repository->findAll();
  }

  /**
   * Methode pour sauvegarder l'entité
   *
   * @param $entity
   */
  public function save($entity, $forceId = false){
    $this->entityManager->persist($entity);

    if($forceId === true):
      $metadata = $this->entityManager->getClassMetaData(get_class($entity));
      $metadata->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_NONE);
      $metadata->setIdGenerator(new AssignedGenerator());
    endif;

    $this->entityManager->flush();

    return $entity;
  }

  /**
   * Methode pour supprimer une entité
   *
   * @param $entity
   */
  public function delete($entity){
    $return = null;

    if($entity):
      $return = $entity;
      $this->entityManager->remove($entity);
      $this->entityManager->flush();
    endif;

    return $return;
  }
}