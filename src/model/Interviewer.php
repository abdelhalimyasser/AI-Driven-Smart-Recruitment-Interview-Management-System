<?php

declare(strict_types=1);

namespace model;

use model\enum\UserRole;

use DateTime;
use Exception;
use http\Exception\RuntimeException;

/**
 * Class Interviewer
 *
 * This class represents an Interviewer user in the system. It extends the base Employee class.
 *
 * @package model
 * @version 1.0
 * @since   24-04-2026
 * @author  Abdelhalim Yasser
*/

class Interviewer extends Employee
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
        string $docs
    ) {
        try {
            parent::__construct(
                $firstName,
                $lastName,
                $birthDate,
                $email,
                $countryCode,
                $phoneNumber,
                $password,
                $userSkills,
                $experienceYear,
                $resumePath,
                $docs,
                UserRole::INTERVIEWER
            );
        } catch(Exception $e) {
            throw new RuntimeException('Failed to create Interviewer: ' . $e->getMessage(), 0, $e);
        }
    }



    public function checkInterviewAvailibiltity(): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function addQuestion(): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function attendInterview(): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }

    public function submintCandidateFeedback(): bool
    {
        throw new \BadMethodCallException('Not implemented.');
    }
}