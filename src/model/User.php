<?php

declare(strict_types=1);

namespace model;
use http\Exception\RuntimeException;
use model\enum\UserRole;

use DateTime;
use DateTimeImmutable;
use Exception as Exception;

/**
 * Class User
 *
 * Represents a user in the system, which can be a basic user, employee (HrAdmin, Interviewer, DepartmentManeger, and ShadowInterviewer) ,and Candidate
 *
 * @package model
 * @version 1.0
 * @since   24-04-2026
 * @author  Abdelhalim Yasser
 */
class User
{
    private string $id;
    private string $firstName;
    private string $lastName;
    private DateTime $birthDate;
    private string $email;
    private string $countryCode;
    private string $phoneNumber;
    private UserRole $role;
    private string $password;
    private array $userSkills = [];
    private string $experienceYear;
    private string $resumePath;
    private string $docs;
    private DateTimeImmutable $createdAt;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param DateTime $birthDate
     * @param string $email
     * @param string $countryCode
     * @param string $phoneNumber
     * @param UserRole $role
     * @param string $password
     * @param array $userSkills
     * @param string $experienceYear
     * @param string $resumePath
     * @param string $docs
     * @throws Exception
     */
    public function __construct(
        string $firstName, 
        string $lastName,
        DateTime $birthDate,
        string $email,
        string $countryCode,
        string $phoneNumber,
        UserRole $role,
        string $password,
        array $userSkills,
        string $experienceYear,
        string $resumePath,
        string $docs
        )
    {
        try {
            $this->id = uniqid('user_', true);
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->birthDate = $birthDate;
            $this->email = $email;
            $this->countryCode = $countryCode;
            $this->phoneNumber = $phoneNumber;
            $this->role = $role;
            $this->password = $password;
            $this->userSkills = $userSkills;
            $this->experienceYear = $experienceYear;
            $this->resumePath = $resumePath;
            $this->docs = $docs;
            $this->createdAt = new DateTimeImmutable();
        } catch(Exception $e) {
            throw new RuntimeException('Failed to create User: ' . $e->getMessage(), 0, $e);
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

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getBirthDate(): ?DateTime
    {
        return $this->birthDate;
    }

    /**
     * @param DateTime $birthDate
     */
    public function setBirthDate(DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getRole(): ?UserRole
    {
        return $this->role;
    }

    /**
     * @param UserRole $role
     */
    public function setRole(UserRole $role): void
    {
        $this->role = $role;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getUserSkills(): array
    {
        return $this->userSkills;
    }

    /**
     * @param array $userSkills
     */
    public function setUserSkills(array $userSkills): void
    {
        $this->userSkills = $userSkills;
    }

    public function getExperienceYear(): ?string
    {
        return $this->experienceYear;
    }

    /**
     * @param string $experienceYear
     */
    public function setExperienceYear(string $experienceYear): void
    {
        $this->experienceYear = $experienceYear;
    }

    public function getResumePath(): ?string
    {
        return $this->resumePath;
    }

    /**
     * @param string $resumePath
     */
    public function setResumePath(string $resumePath): void
    {
        $this->resumePath = $resumePath;
    }

    public function getDocs(): ?string
    {
        return $this->docs;
    }

    /**
     * @param string $docs
     */
    public function setDocs(string $docs): void
    {
        $this->docs = $docs;
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