<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $nomUtilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomUtilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailUtilisateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motdepasseUtilisateur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $adminUtilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }

    public function setNomUtilisateur(string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;

        return $this;
    }

    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }

    public function setPrenomUtilisateur(string $prenomUtilisateur): self
    {
        $this->prenomUtilisateur = $prenomUtilisateur;

        return $this;
    }

    public function getEmailUtilisateur(): ?string
    {
        return $this->emailUtilisateur;
    }

    public function setEmailUtilisateur(string $emailUtilisateur): self
    {
        $this->emailUtilisateur = $emailUtilisateur;

        return $this;
    }

    public function getMotdepasseUtilisateur(): ?string
    {
        return $this->motdepasseUtilisateur;
    }

    public function setMotdepasseUtilisateur(string $motdepasseUtilisateur): self
    {
        $this->motdepasseUtilisateur = $motdepasseUtilisateur;

        return $this;
    }

    public function isAdminUtilisateur(): ?bool
    {
        return $this->adminUtilisateur;
    }

    public function setAdminUtilisateur(bool $adminUtilisateur): self
    {
        $this->adminUtilisateur = $adminUtilisateur;

        return $this;
    }
}
