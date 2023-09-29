<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleAvis;

    /**
     * @ORM\Column(type="integer")
     */
    private $noteAvis;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUtilisateurAvis;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleAvis(): ?string
    {
        return $this->libelleAvis;
    }

    public function setLibelleAvis(string $libelleAvis): self
    {
        $this->libelleAvis = $libelleAvis;

        return $this;
    }

    public function getNoteAvis(): ?int
    {
        return $this->noteAvis;
    }

    public function setNoteAvis(int $noteAvis): self
    {
        $this->noteAvis = $noteAvis;

        return $this;
    }

    public function getIdUtilisateurAvis(): ?int
    {
        return $this->idUtilisateurAvis;
    }

    public function setIdUtilisateurAvis(int $idUtilisateurAvis): self
    {
        $this->idUtilisateurAvis = $idUtilisateurAvis;

        return $this;
    }
}
