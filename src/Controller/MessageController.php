<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace App\Controller;

use App\DataTransfer\LogDTO;
use App\Message\CreateLogMessage;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/v3/logs", name="v3")
 */
class MessageController extends AbstractApiController
{
    public function __invoke(Request $request, MessageBusInterface $bus)
    {
        /** @var LogDTO $dto */
        $dto = $this->convert($request, LogDTO::class);

        $message = new CreateLogMessage($dto->getUserId(), $dto->getTimestamp());
        $bus->dispatch($message);

        return $this->json(["success" => true]);
    }
}
