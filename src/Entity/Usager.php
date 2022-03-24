<?php

namespace App\Entity;

use App\Entity\Abstractor\Generic;
use App\Repository\UsagerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UsagerRepository::class)
 */
class Usager extends Generic implements \Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface
{
  use \Knp\DoctrineBehaviors\Model\Translatable\TranslatableTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surnom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surnomEn;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parent1_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parent2_id;

    /**
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $valide;

  /**
   * @Assert\Valid
   */
  protected $translations;

    public function getId(): ?int
    {
        return $this->id;
    }

  public function setValide(bool $valide): self
  {
    $this->valide = $valide;

    return $this;
  }

    public function getValide(): bool
    {
      return $this->valide;
    }

    public function valider(): self
    {
      $this->valide = true;

      return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPrenom2(): ?string
    {
        return $this->prenom2;
    }

    public function setPrenom2(?string $prenom2): self
    {
        $this->prenom2 = $prenom2;

        return $this;
    }

    public function getPrenom3(): ?string
    {
        return $this->prenom3;
    }

    public function setPrenom3(?string $prenom3): self
    {
        $this->prenom3 = $prenom3;

        return $this;
    }

    public function getPrenom4(): ?string
    {
        return $this->prenom4;
    }

    public function setPrenom4(?string $prenom4): self
    {
        $this->prenom4 = $prenom4;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSurnom(): ?string
    {
        return $this->surnom;
    }

    public function setSurnom(string $surnom): self
    {
        $this->surnom = $surnom;

        return $this;
    }

    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    public function setDateNaissance($date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getParent1Id(): ?int
    {
        return $this->parent1_id;
    }

    public function setParent1Id(?int $parent1_id): self
    {
        $this->parent1_id = $parent1_id;

        return $this;
    }

    public function getParent2Id(): ?int
    {
        return $this->parent2_id;
    }

    public function setParent2Id(?int $parent2_id): self
    {
        $this->parent2_id = $parent2_id;

        return $this;
    }

  /**
   * @return mixed
   */
  public function getSurnomEn()
  {
    return $this->surnomEn;
  }

  /**
   * @param mixed $surnomEn
   */
  public function setSurnomEn($surnomEn): void
  {
    $this->surnomEn = $surnomEn;
  }

  /**
   * @return mixed
   */
  public function getTranslations()
  {
    return $this->translations;
  }

  /**
   * @param mixed $translations
   */
  public function setTranslations($translations): void
  {
    $this->translations = $translations;
  }


}
