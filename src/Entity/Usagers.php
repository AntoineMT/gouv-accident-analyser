<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsagersRepository")
 */
class Usagers
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
    private $place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $catu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $grav;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trajet;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $locp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $actp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $etatp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anNais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $numVeh;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Accidents", inversedBy="usagers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $acccident;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace( $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getCatu(): ?string
    {
        return $this->catu;
    }

    public function setCatu( $catu): self
    {
        $this->catu = $catu;

        return $this;
    }

    public function getGrav(): ?string
    {
        return $this->grav;
    }

    public function setGrav( $grav): self
    {
        $this->grav = $grav;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe( $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getTrajet(): ?string
    {
        return $this->trajet;
    }

    public function setTrajet( $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getSecu(): ?string
    {
        return $this->secu;
    }

    public function setSecu( $secu): self
    {
        $this->secu = $secu;

        return $this;
    }

    public function getLocp(): ?string
    {
        return $this->locp;
    }

    public function setLocp( $locp): self
    {
        $this->locp = $locp;

        return $this;
    }

    public function getActp(): ?string
    {
        return $this->actp;
    }

    public function setActp( $actp): self
    {
        $this->actp = $actp;

        return $this;
    }

    public function getEtatp(): ?string
    {
        return $this->etatp;
    }

    public function setEtatp( $etatp): self
    {
        $this->etatp = $etatp;

        return $this;
    }

    public function getAnNais(): ?string
    {
        return $this->anNais;
    }

    public function setAnNais( $anNais): self
    {
        $this->anNais = $anNais;

        return $this;
    }

    public function getNumVeh(): ?string
    {
        return $this->numVeh;
    }

    public function setNumVeh( $numVeh): self
    {
        $this->numVeh = $numVeh;

        return $this;
    }

    public function getAcccident(): ?Accidents
    {
        return $this->acccident;
    }

    public function setAcccident(?Accidents $acccident): self
    {
        $this->acccident = $acccident;

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
