<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace App\Message;

class CreateLogMessage
{
    /** @var string  */
    private $userId;

    /** @var int */
    private $timestamp;

    public function __construct(string $userId, int $timestamp)
    {
        $this->userId = $userId;
        $this->timestamp = $timestamp;
    }
}