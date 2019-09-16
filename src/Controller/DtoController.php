<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

declare(strict_types=1);

namespace App\Controller;

use App\DataTransfer\LogDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/v2/logs", name="v2")
 */
class DtoController extends AbstractController
{
    public function __invoke(Request $request, SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $dto = $serializer->deserialize($request->getContent(), LogDTO::class, 'json');

        $violations = $validator->validate($dto);

        if (count($violations) > 0) {
            return JsonResponse::fromJsonString($serializer->serialize($violations, 'json'), 400);
        }

        // @todo something with your data

        return $this->json(["success" => true]);
    }
}
