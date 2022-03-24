<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * Class TextWidgetTranslation
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UsagerTranslationRepository")
 */
class UsagerTranslation implements \Knp\DoctrineBehaviors\Contract\Entity\TranslationInterface
{
  use \Knp\DoctrineBehaviors\Model\Translatable\TranslationTrait;

  /**
   * @var $contenu string
   * @ORM\Column(type="text", nullable=true)
   */
  private $contenu;
  /**
   * @var int
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @return string
   */
  public function getContenu(): ?string
  {
    return $this->contenu;
  }

  /**
   * @param string $contenu
   * @return TextWidgetTranslation
   */
  public function setContenu(?string $contenu): self
  {
    $this->contenu = $contenu;
    return $this;
  }
}