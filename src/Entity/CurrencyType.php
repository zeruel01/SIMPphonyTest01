<?php

namespace App\Entity;

use App\Repository\CurrencyTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CurrencyTypeRepository::class)
 */
class CurrencyType
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $shortname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $longname;

    /**
     * @ORM\OneToMany(targetEntity=CurrencyHistory::class, mappedBy="originalCurrencyTypeId", orphanRemoval=true)
     */
    private $originCurrencyHistories;

    /**
     * @ORM\OneToMany(targetEntity=CurrencyHistory::class, mappedBy="resultCurrencyTypeId", orphanRemoval=true)
     */
    private $resultCurrencyHistories;

    public function __construct()
    {
        $this->originCurrencyHistories = new ArrayCollection();
        $this->resultCurrencyHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getShortname(): ?string
    {
        return $this->shortname;
    }

    public function setShortname(string $shortname): self
    {
        $this->shortname = $shortname;

        return $this;
    }

    public function getLongname(): ?string
    {
        return $this->longname;
    }

    public function setLongname(string $longname): self
    {
        $this->longname = $longname;

        return $this;
    }

    /**
     * @return Collection|CurrencyHistory[]
     */
    public function getOriginCurrencyHistories(): Collection
    {
        return $this->originCurrencyHistories;
    }

    public function addOriginCurrencyHistory(CurrencyHistory $originCurrencyHistory): self
    {
        if (!$this->originCurrencyHistories->contains($originCurrencyHistory)) {
            $this->originCurrencyHistories[] = $originCurrencyHistory;
            $originCurrencyHistory->setOriginalCurrencyTypeId($this);
        }

        return $this;
    }

    public function removeOriginCurrencyHistory(CurrencyHistory $originCurrencyHistory): self
    {
        if ($this->originCurrencyHistories->contains($originCurrencyHistory)) {
            $this->originCurrencyHistories->removeElement($originCurrencyHistory);
            // set the owning side to null (unless already changed)
            if ($originCurrencyHistory->getOriginalCurrencyTypeId() === $this) {
                $originCurrencyHistory->setOriginalCurrencyTypeId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CurrencyHistory[]
     */
    public function getResultCurrencyHistories(): Collection
    {
        return $this->resultCurrencyHistories;
    }

    public function addResultCurrencyHistory(CurrencyHistory $resultCurrencyHistory): self
    {
        if (!$this->resultCurrencyHistories->contains($resultCurrencyHistory)) {
            $this->resultCurrencyHistories[] = $resultCurrencyHistory;
            $resultCurrencyHistory->setResultCurrencyTypeId($this);
        }

        return $this;
    }

    public function removeResultCurrencyHistory(CurrencyHistory $resultCurrencyHistory): self
    {
        if ($this->resultCurrencyHistories->contains($resultCurrencyHistory)) {
            $this->resultCurrencyHistories->removeElement($resultCurrencyHistory);
            // set the owning side to null (unless already changed)
            if ($resultCurrencyHistory->getResultCurrencyTypeId() === $this) {
                $resultCurrencyHistory->setResultCurrencyTypeId(null);
            }
        }

        return $this;
    }
}
