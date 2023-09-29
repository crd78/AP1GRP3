<?php

namespace App\Entity;

use App\Repository\ConsommerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsommerRepository::class)
 */
class Consommer
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
    private $idPrestation;

    /**
     * @ORM\Column(type="integer")
     */
    private $idUtilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPrestation(): ?int
    {
        return $this->idPrestation;
    }

    public function setIdPrestation(int $idPrestation): self
    {
        $this->idPrestation = $idPrestation;

        return $this;
    }

    public function getIdUtilisateur(): ?int
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(int $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }
}
