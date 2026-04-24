<?php

declare(strict_types=1);

namespace model;

use model\enum\UserRole;

use DateTime;
use Exception;
use http\Exception\RuntimeException;

/**
 * Class Candidate
 *
 * This class represents an Candidate user in the system. It extends the base User class.
 *
 * @package model
 * @version 1.0
 * @since   24-04-2026
 * @author  Abdelhalim Yasser
*/

class Candidate extends User
{
    /**
     * @param string $firstName
     * @param string $lastName
     * @param DateTime $birthDate
     * @param string $email
     * @param string $countryCode
     * @param string $phoneNumber
     * @param string $password
     * @param array $userSkills
     * @param string $experienceYear
     * @param string $resumePath
     * @param string $docs
     * @param UserRole $role
     * @throws Exception
     */
    public function __construct(
        string $firstName,
        string $lastName,
        DateTime $birthDate,
        string $email,
        string $countryCode,
        string $phoneNumber,
        string $password,
        array $userSkills,
        string $experienceYear,
        string $resumePath,
        string $docs,
        UserRole $role = UserRole::CANDIDATE
    ) {
        try {
            parent::__construct(
                $firstName,
                $lastName,
                $birthDate,
                $email,
                $countryCode,
                $phoneNumber,
                $role,
                $password,
                $userSkills,
                $experienceYear,
                $resumePath,
                $docs
            );
        } catch(Exception $e) {
            throw new RuntimeException('Failed to create Candidate: ' . $e->getMessage(), 0, $e);
        }
    }
}