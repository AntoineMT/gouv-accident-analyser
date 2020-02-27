<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculesRepository")
 */
class Vehicules
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $senc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $catv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $occutc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $obs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $obsm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $choc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $manv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numVeh;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Accidents", inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $accident;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSenc(): ?string
    {
        return $this->senc;
    }

    public function setSenc(string $senc): self
    {
        $this->senc = $senc;

        return $this;
    }

    public function getCatv(): ?string
    {
        return $this->catv;
    }

    public function setCatv(string $catv): self
    {
        $this->catv = $catv;

        return $this;
    }

    public function getOccutc(): ?string
    {
        return $this->occutc;
    }

    public function setOccutc(string $occutc): self
    {
        $this->occutc = $occutc;

        return $this;
    }

    public function getObs(): ?string
    {
        return $this->obs;
    }

    public function setObs(string $obs): self
    {
        $this->obs = $obs;

        return $this;
    }

    public function getObsm(): ?string
    {
        return $this->obsm;
    }

    public function setObsm(string $obsm): self
    {
        $this->obsm = $obsm;

        return $this;
    }

    public function getChoc(): ?string
    {
        return $this->choc;
    }

    public function setChoc(string $choc): self
    {
        $this->choc = $choc;

        return $this;
    }

    public function getManv(): ?string
    {
        return $this->manv;
    }

    public function setManv(string $manv): self
    {
        $this->manv = $manv;

        return $this;
    }

    public function getNumVeh(): ?string
    {
        return $this->numVeh;
    }

    public function setNumVeh(string $numVeh): self
    {
        $this->numVeh = $numVeh;

        return $this;
    }

    public function getAccident(): ?Accidents
    {
        return $this->accident;
    }

    public function setAccident(?Accidents $accident): self
    {
        $this->accident = $accident;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }
}
