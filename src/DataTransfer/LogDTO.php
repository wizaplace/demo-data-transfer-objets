<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace App\DataTransfer;

use Symfony\Component\Validator\Constraints as Assert;

class LogDTO
{
    /**
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Uuid()
     */
    private $userId;

    /**
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Type("integer")
     */
    private $timestamp;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp): void
    {
        $this->timestamp = $timestamp;
    }
}