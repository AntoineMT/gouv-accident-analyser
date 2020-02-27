<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AccidentsRepository")
 */
class Accidents
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $catr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $voie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $v1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $v2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $circ;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nbv;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pr1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $vosp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prof;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $plan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lartpc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $larrout;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $infra;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $situ;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $env1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $an;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mois;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $jour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hrmn;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lum;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $agg;

    /**
     * @ORM\Column(name="int_r", type="string", length=255, nullable=true)
     */
    private $int;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $atm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $col;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $com;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gps;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lat;

    /**
     * @ORM\Column(name="long_r", type="string", length=255, nullable=true)
     */
    private $long;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dep;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usagers", mappedBy="acccident", orphanRemoval=true)
     */
    private $usagers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vehicules", mappedBy="accident", orphanRemoval=true)
     */
    private $vehicules;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    public function __construct()
    {
        $this->usagers = new ArrayCollection();
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNumAcc(): ?string
    {
        return $this->numAcc;
    }

    public function setNumAcc(?string $numAcc): self
    {
        $this->numAcc = $numAcc;

        return $this;
    }

    public function getCatr(): ?string
    {
        return $this->catr;
    }

    public function setCatr(string $catr): self
    {
        $this->catr = $catr;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(string $voie): self
    {
        $this->voie = $voie;

        return $this;
    }

    public function getV1(): ?string
    {
        return $this->v1;
    }

    public function setV1(string $v1): self
    {
        $this->v1 = $v1;

        return $this;
    }

    public function getV2(): ?string
    {
        return $this->v2;
    }

    public function setV2(string $v2): self
    {
        $this->v2 = $v2;

        return $this;
    }

    public function getCirc(): ?string
    {
        return $this->circ;
    }

    public function setCirc(string $circ): self
    {
        $this->circ = $circ;

        return $this;
    }

    public function getNbv(): ?string
    {
        return $this->nbv;
    }

    public function setNbv(string $nbv): self
    {
        $this->nbv = $nbv;

        return $this;
    }

    public function getPr(): ?string
    {
        return $this->pr;
    }

    public function setPr(string $pr): self
    {
        $this->pr = $pr;

        return $this;
    }

    public function getPr1(): ?string
    {
        return $this->pr1;
    }

    public function setPr1(string $pr1): self
    {
        $this->pr1 = $pr1;

        return $this;
    }

    public function getVosp(): ?string
    {
        return $this->vosp;
    }

    public function setVosp(string $vosp): self
    {
        $this->vosp = $vosp;

        return $this;
    }

    public function getProf(): ?string
    {
        return $this->prof;
    }

    public function setProf(string $prof): self
    {
        $this->prof = $prof;

        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(string $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getLartpc(): ?string
    {
        return $this->lartpc;
    }

    public function setLartpc(string $lartpc): self
    {
        $this->lartpc = $lartpc;

        return $this;
    }

    public function getLarrout(): ?string
    {
        return $this->larrout;
    }

    public function setLarrout(string $larrout): self
    {
        $this->larrout = $larrout;

        return $this;
    }

    public function getSurf(): ?string
    {
        return $this->surf;
    }

    public function setSurf(string $surf): self
    {
        $this->surf = $surf;

        return $this;
    }

    public function getInfra(): ?string
    {
        return $this->infra;
    }

    public function setInfra(string $infra): self
    {
        $this->infra = $infra;

        return $this;
    }

    public function getSitu(): ?string
    {
        return $this->situ;
    }

    public function setSitu(string $situ): self
    {
        $this->situ = $situ;

        return $this;
    }

    public function getEnv1(): ?string
    {
        return $this->env1;
    }

    public function setEnv1(string $env1): self
    {
        $this->env1 = $env1;

        return $this;
    }

    public function getAn(): ?string
    {
        return $this->an;
    }

    public function setAn(string $an): self
    {
        $this->an = $an;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getHrmn(): ?string
    {
        return $this->hrmn;
    }

    public function setHrmn(string $hrmn): self
    {
        $this->hrmn = $hrmn;

        return $this;
    }

    public function getLum(): ?string
    {
        return $this->lum;
    }

    public function setLum(string $lum): self
    {
        $this->lum = $lum;

        return $this;
    }

    public function getAgg(): ?string
    {
        return $this->agg;
    }

    public function setAgg(string $agg): self
    {
        $this->agg = $agg;

        return $this;
    }

    public function getInt(): ?string
    {
        return $this->int;
    }

    public function setInt(string $int): self
    {
        $this->int = $int;

        return $this;
    }

    public function getAtm(): ?string
    {
        return $this->atm;
    }

    public function setAtm(string $atm): self
    {
        $this->atm = $atm;

        return $this;
    }

    public function getCol(): ?string
    {
        return $this->col;
    }

    public function setCol(string $col): self
    {
        $this->col = $col;

        return $this;
    }

    public function getCom(): ?string
    {
        return $this->com;
    }

    public function setCom(string $com): self
    {
        $this->com = $com;

        return $this;
    }

    public function getAdr(): ?string
    {
        return $this->adr;
    }

    public function setAdr(string $adr): self
    {
        $this->adr = $adr;

        return $this;
    }

    public function getGps(): ?string
    {
        return $this->gps;
    }

    public function setGps(string $gps): self
    {
        $this->gps = $gps;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLong(): ?string
    {
        return $this->long;
    }

    public function setLong(string $long): self
    {
        $this->long = $long;

        return $this;
    }

    public function getDep(): ?string
    {
        return $this->dep;
    }

    public function setDep(string $dep): self
    {
        $this->dep = $dep;

        return $this;
    }

    /**
     * @return Collection|Usagers[]
     */
    public function getUsagers(): Collection
    {
        return $this->usagers;
    }

    public function addUsager(Usagers $usager): self
    {
        if (!$this->usagers->contains($usager)) {
            $this->usagers[] = $usager;
            $usager->setAcccident($this);
        }

        return $this;
    }

    public function removeUsager(Usagers $usager): self
    {
        if ($this->usagers->contains($usager)) {
            $this->usagers->removeElement($usager);
            // set the owning side to null (unless already changed)
            if ($usager->getAcccident() === $this) {
                $usager->setAcccident(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Vehicules[]
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicules $vehicule): self
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules[] = $vehicule;
            $vehicule->setAccident($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicules $vehicule): self
    {
        if ($this->vehicules->contains($vehicule)) {
            $this->vehicules->removeElement($vehicule);
            // set the owning side to null (unless already changed)
            if ($vehicule->getAccident() === $this) {
                $vehicule->setAccident(null);
            }
        }

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
