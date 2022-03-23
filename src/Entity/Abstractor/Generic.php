<?php

namespace App\Entity\Abstractor;

use App\Entity\User;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;
use PhpOffice\PhpSpreadsheet\Calculation\DateTime;
use Symfony\Component\Security\Core\Event\AuthenticationEvent;
use Symfony\Component\Security\Core\Security;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
class Generic{

  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  protected $id;

  /**
   * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
   */
  protected $createdAt;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  protected $createdBy;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  protected $updatedAt;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  protected $updatedBy;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  protected $deletedAt;

  /**
   * @ORM\Column(type="integer", nullable=true)
   */
  protected $deletedBy;

  /**
   * @ORM\Column(type="boolean", nullable=true)
   */
  protected $isDraft;

  public function getId(): ?int{
    return $this->id;
  }

  public function getCreatedAt(): ?\DateTimeInterface{
    return $this->createdAt;
  }

  public function setCreatedAt(?\DateTime $date = null){
    if($date == null){
      $this->createdAt = new \DateTime;
    } else {
      $this->createdAt = $date;
    }
    return $this;
  }

  public function getCreatedBy(): ?int{
    return $this->createdBy;
  }

  public function setCreatedBy(User $user = null): self{
    if($user)
      $this->createdBy = $user->getId();

    return $this;
  }

  public function getUpdatedAt(): ?\DateTimeInterface{
    return $this->updatedAt;
  }

  public function setUpdatedAt($auto = true){
    $this->updatedAt = $auto ? new \DateTime : null;

    return $this;
  }

  public function getUpdatedBy(): ?int{
    return $this->updatedBy;
  }

  public function setUpdatedBy(User $user = null): self{
    if($user)
      $this->updatedBy = $user->getId();

    return $this;
  }

  public function getDeletedAt(): ?\DateTimeInterface{
    return $this->deletedAt;
  }

  public function setDeletedAt($auto = true){
    $this->deletedAt = $auto ? new \DateTime : null;
    return $this;
  }

  public function getDeletedBy(): ?int{
    return $this->deletedBy;
  }

  public function setDeletedBy(User $user = null): self{
    $this->deletedBy = $user ? $user->getId() : null;

    return $this;
  }

  public function getIsDraft(): ?bool{
    return $this->isDraft;
  }

  public function setIsDraft(?bool $isDraft): self{
    $this->isDraft = $isDraft;

    return $this;
  }

  public function excludeDeleteChidObject(Collection $listObject):Collection{
    foreach ($listObject as $object){
      if(!empty($object->getDeletedAt())){
        $listObject->removeElement($object);
      }
    }

    return $listObject;
  }
}
