<?php

declare(strict_types=1);

namespace model;

use DateTimeImmutable;
use RuntimeException;

/**
 * Class Notification
 * @package model
 * @author  Abdelhalim Yasser
 * @version 1.0
 * @since   24-04-2026
*/
class Notification
{
    private string $id;
    private ?string $message;
    private ?DateTimeImmutable $sendAt;
    private ?DateTimeImmutable $receivedAt;
    private ?DateTimeImmutable $readAt;
    private bool $submittedFeedback;

    /**
     * @param string $message
     * @param DateTimeImmutable $sendAt
     * @param DateTimeImmutable $receivedAt
     * @param DateTimeImmutable $readAt
     * @param bool $submittedFeedback
     * @throws RuntimeException
    */
    public function __construct(
        string $message,
        DateTimeImmutable $sendAt,
        DateTimeImmutable $receivedAt,
        DateTimeImmutable $readAt,
        bool $submittedFeedback
    )
    {
        try {
            $this->id = uniqid('message_', true);
            $this->message = $message;
            $this->sendAt = $sendAt;
            $this->receivedAt = $receivedAt;
            $this->readAt = $readAt;
            $this->submittedFeedback = $submittedFeedback;
        } catch (\Exception $e) {
            throw new \RuntimeException('Failed to create Notification: ' . $e->getMessage(), 0, $e);
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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function getSendAt(): ?DateTimeImmutable
    {
        return $this->sendAt;
    }

    /**
     * @param DateTimeImmutable $sendAt
     */
    public function setSendAt(DateTimeImmutable $sendAt): void
    {
        $this->sendAt = $sendAt;
    }

    public function getReceivedAt(): ?DateTimeImmutable
    {
        return $this->receivedAt;
    }

    /**
     * @param DateTimeImmutable $receivedAt
     */
    public function setReceivedAt(DateTimeImmutable $receivedAt): void
    {
        $this->receivedAt = $receivedAt;
    }

    public function getReadAt(): ?DateTimeImmutable
    {
        return $this->readAt;
    }

    /**
     * @param DateTimeImmutable $readAt
     */
    public function setReadAt(DateTimeImmutable $readAt): void
    {
        $this->readAt = $readAt;
    }

    public function getSubmittedFeedback(): bool
    {
        return $this->submittedFeedback;
    }

    /**
     * @param bool $submittedFeedback
     */
    public function setSubmittedFeedback(bool $submittedFeedback): void
    {
        $this->submittedFeedback = $submittedFeedback;
    }
}
