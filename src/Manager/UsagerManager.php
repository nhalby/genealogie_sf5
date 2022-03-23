<?php

namespace App\Manager;

use App\Entity\Usager;
use App\Entity\StoredFile;
use App\Entity\User;
use App\Entity\Abstractor\Generic;
use App\Manager\Abstractor\GlobalManager;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\AssignedGenerator;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;

class UsagerManager extends GlobalManager  {

  private $entityManager;
  private $validator;
  private $repository;

  public function __construct(
    ManagerRegistry $doctrine,
    ValidatorInterface $validator)
  {
    $this->entityManager = $doctrine->getManager();
    $this->validator = $validator;
    $this->repository = $this->entityManager->getRepository(Usager::class);
  }
}