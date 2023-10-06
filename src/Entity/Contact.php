<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $CtIdUtilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ObjetContact;

    /**
     * @ORM\Column(type="text")
     */
    private $ContenuContact;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateContact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCtIdUtilisateur(): ?int
    {
        return $this->CtIdUtilisateur;
    }

    public function setCtIdUtilisateur(int $CtIdUtilisateur): self
    {
        $this->CtIdUtilisateur = $CtIdUtilisateur;

        return $this;
    }

    public function getObjetContact(): ?string
    {
        return $this->ObjetContact;
    }

    public function setObjetContact(string $ObjetContact): self
    {
        $this->ObjetContact = $ObjetContact;

        return $this;
    }

    public function getContenuContact(): ?string
    {
        return $this->ContenuContact;
    }

    public function setContenuContact(string $ContenuContact): self
    {
        $this->ContenuContact = $ContenuContact;

        return $this;
    }

    public function getDateContact(): ?\DateTimeInterface
    {
        return $this->dateContact;
    }

    public function setDateContact(\DateTimeInterface $dateContact): self
    {
        $this->dateContact = $dateContact;

        return $this;
    }
}
