<?php

declare(strict_types=1);

namespace model;

use model\enum\UserRole;

use BadMethodCallException;
use DateTime;
use Exception;
use http\Exception\RuntimeException;

/**
 * Class Employee
 *
 * This class represents an Employee user in the system. It extends the base User class and includes additional properties and methods specific to employees, such as making referrals.
 *
 * <strong>"makeReferal" method is under construction, it will be implemented soon.</strong>
 *
 * @package model
 * @version 1.0
 * @since   24-04-2026
 * @author  Abdelhalim Yasser
 */

class Employee extends User
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
        UserRole $role = UserRole::EMPLOYEE
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
            throw new RuntimeException('Failed to create Employee: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * @param int $user
     */
    public function makeReferal(int $user): bool
    {
        throw new BadMethodCallException('Not implemented yet.');
    }
}