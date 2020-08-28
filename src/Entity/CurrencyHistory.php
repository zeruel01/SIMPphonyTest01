<?php

namespace App\Entity;

use App\Repository\CurrencyHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CurrencyHistoryRepository::class)
 */
class CurrencyHistory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $originalAmount;

    /**
     * @ORM\ManyToOne(targetEntity=currencyType::class, inversedBy="originCurrencyHistories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $originalCurrencyTypeId;

    /**
     * @ORM\ManyToOne(targetEntity=currencyType::class, inversedBy="resultCurrencyHistories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $resultCurrencyTypeId;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $currencyResult;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOriginalAmount(): ?float
    {
        return $this->originalAmount;
    }

    public function setOriginalAmount(float $originalAmount): self
    {
        $this->originalAmount = $originalAmount;

        return $this;
    }

    public function getOriginalCurrencyTypeId(): ?currencyType
    {
        return $this->originalCurrencyTypeId;
    }

    public function setOriginalCurrencyTypeId(?currencyType $originalCurrencyTypeId): self
    {
        $this->originalCurrencyTypeId = $originalCurrencyTypeId;

        return $this;
    }

    public function getResultCurrencyTypeId(): ?currencyType
    {
        return $this->resultCurrencyTypeId;
    }

    public function setResultCurrencyTypeId(?currencyType $resultCurrencyTypeId): self
    {
        $this->resultCurrencyTypeId = $resultCurrencyTypeId;

        return $this;
    }

    public function getCurrencyResult(): ?float
    {
        return $this->currencyResult;
    }

    public function setCurrencyResult(?float $currencyResult): self
    {
        $this->currencyResult = $currencyResult;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
}
