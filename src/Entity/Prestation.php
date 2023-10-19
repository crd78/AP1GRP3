<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationRepository::class)
 */
class Prestation
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
    private $libellePrestation;

    /**
     * @ORM\Column(type="integer")
     */
    private $prixUnitairePrestation;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionPrestation;

    /**
     * @ORM\Column(type="integer")
     */
    private $dureePrestation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibellePrestation(): ?string
    {
        return $this->libellePrestation;
    }

    public function setLibellePrestation(string $libellePrestation): self
    {
        $this->libellePrestation = $libellePrestation;

        return $this;
    }

    public function getPrixUnitairePrestation(): ?int
    {
        return $this->prixUnitairePrestation;
    }

    public function setPrixUnitairePrestation(int $prixUnitairePrestation): self
    {
        $this->prixUnitairePrestation = $prixUnitairePrestation;

        return $this;
    }

    public function getDescriptionPrestation(): ?string
    {
        return $this->descriptionPrestation;
    }

    public function setDescriptionPrestation(string $descriptionPrestation): self
    {
        $this->descriptionPrestation = $descriptionPrestation;

        return $this;
    }

    public function getDureePrestation(): ?int
    {
        return $this->dureePrestation;
    }

    public function setDureePrestation(int $dureePrestation): self
    {
        $this->dureePrestation = $dureePrestation;

        return $this;
    }
}
