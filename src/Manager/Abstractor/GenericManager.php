<?php

namespace App\Manager\Abstractor;

use App\Entity\Abstractor\Generic;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\Mapping\Entity;

/**
 * Class GenericManager
 *
 * @package App\Manager\Abstractor
 */
class GenericManager extends GlobalManager{
  private $repository;

  /**
   * GenericManager constructor.
   *
   * @param ObjectManager    $objectManager
   * @param ObjectRepository $repository
   */
  public function __construct(ObjectManager $objectManager, ObjectRepository $repository){
    $this->repository    = $repository;
    $objectManager->getFilters()->enable('deleted_at');
    parent::__construct($objectManager, $repository);
  }

  /**
   * Methode pour recuperer une entité en fonction de son ID
   *
   * @param int $entityId
   * @return object
   */
  public function get(int $entityId, $includeDeleted = false){
    $entity = $this->repository->find($entityId, null, null);
    if($entity && $entity->getDeletedAt() != null && !$includeDeleted):
      $entity = null;
    endif;

    return $entity;
  }

  /**
   * Methode pour recuperer une entité en fonction de paramètres
   *
   * @param int $entityId
   * @return object
   */
  public function getOneBy(array $criteria, array $orderBy = null, $includeDeleted = false){
    $entity = $this->repository->findOneBy($criteria, $orderBy, $includeDeleted);
    if($entity && $entity->getDeletedAt() != null && !$includeDeleted):
      $entity = null;
    endif;

    return $entity;
  }

  /**
   * Methode pour récuperer toutes les entitées
   *
   * @param array $orderBy (['field' => 'order'])
   * @param bool  $includeDeleted
   * @return int|object[]
   */
  public function getAll($orderBy = [], $limit = null, $offset = null, $includeDeleted = false){
    return $this->repository->findAll($orderBy, $limit, $offset, $includeDeleted);
  }

  /**
   * Methode pour récuperer toutes les entitées
   *
   * @param array $orderBy (['field' => 'order'])
   * @param bool  $includeDeleted
   * @return int|object[]
   */
  public function getAllDeleted($orderBy = [], $limit = null, $offset = null){
    return $this->repository->findAllDeleted($orderBy, $limit, $offset);
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
   * Methode d'ajout d'une entité
   *
   * @param $title
   * @param $content
   * @return Generic
   */
  public function add(Generic $entity, User $currentUser = null, $forceId = false){
    $entity->setCreatedBy($currentUser);

    return $this->save($entity, $forceId);
  }

  /**
   * Met à jour une entité
   *
   * @param Generic $entity
   * @return Generic|null
   */
  public function update(Generic $entity, User $currentUser = null){
    $return = null;

    if($entity):
      $entity->setUpdatedBy($currentUser);
      $return = $this->save($entity);
    endif;

    return $return;
  }

  /**
   * Methode pour supprimer une entité
   *
   * @param $entityId
   */
  public function delete($entity, User $currentUser = null){
    $return = null;
    if($entity instanceof Generic):
      $entity->setDeletedAt();
      $entity->setDeletedBy($currentUser);

      $return = $this->save($entity);
    endif;

    return $return;
  }

  /**
   * Methode pour supprimer une entité
   *
   * @param $entityId
   */
  public function destruct($entity){
    $return = null;

    if($entity instanceof Generic):
      $return = parent::delete($entity);
    endif;

    return $return;
  }

  /**
   * Methode pour restorer une entité
   *
   * @param $entity
   */
  public function restore(Generic $entity, User $currentUser = null){
    $return = null;

    if($entity):
      $entity->setDeletedAt(false);
      $entity->setDeletedBy(null);

      $return = $this->update($entity, $currentUser);
    endif;

    return $return;
  }

}