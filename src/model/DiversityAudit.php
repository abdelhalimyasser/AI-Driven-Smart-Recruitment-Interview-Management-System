<?php

declare(strict_types=1);

namespace model;

use model\enum\Ethnicity;
use model\enum\Gender;

use DateTimeImmutable;
use Exception;
use RuntimeException;

/**
 * Class DiversityAudit
 * @package model
 * @author  Abdelhalim Yasser
 * @version 1.0
 * @since   24-04-2026
*/
class DiversityAudit
{
    private string $id;
    private ?Gender $gender;
    private ?Ethnicity $ethnicity;
    private bool $disabilityStatus;
    private ?DateTimeImmutable $createdAt;

    /***/
    public function __construct(
        Gender $gender,
        Ethnicity $ethnicity,
        bool $disabilityStatus,
    )
    {
        try {
            $this->id = uniqid('audit_', true);
            $this->gender = $gender;
            $this->ethnicity = $ethnicity;
            $this->disabilityStatus = $disabilityStatus;
            $this->createdAt = new DateTimeImmutable();
        } catch (Exception $e) {
            throw new RuntimeException('Failed to create DiversityAudit: ' . $e->getMessage(), 0, $e);
        }
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    /**
     * @param Gender $gender
     */
    public function setGender(Gender $gender): void
    {
        $this->gender = $gender;
    }

    public function getEthnicity(): ?Ethnicity
    {
        return $this->ethnicity;
    }

    /**
     * @param Ethnicity $ethnicity
     */
    public function setEthnicity(Ethnicity $ethnicity): void
    {
        $this->ethnicity = $ethnicity;
    }

    public function getDisabilityStatus(): bool
    {
        return $this->disabilityStatus;
    }

    /**
     * @param bool $disabilityStatus
     */
    public function setDisabilityStatus(bool $disabilityStatus): void
    {
        $this->disabilityStatus = $disabilityStatus;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeImmutable $createdAt
     */
    public function setCreatedAt(DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
