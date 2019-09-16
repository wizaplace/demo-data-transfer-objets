<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\CreateLogMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateLogHandler implements MessageHandlerInterface
{
    public function __invoke(CreateLogMessage $message)
    {
        // TODO: Implement __invoke() method.
    }
}