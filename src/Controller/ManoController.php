<?php

namespace App\Controller;

use App\Validation\UuidValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/v1/logs", name="v1")
 */
class ManoController extends AbstractController
{
    public function __invoke(Request $request, UuidValidator $uuidValidator)
    {
        if (false === $request->request->has('userId')) {
            throw new BadRequestHttpException('Missing parameter userId');
        }
        $userId = $request->get('userId');
        if (false === is_string($userId) || false === $uuidValidator->isValid($userId)) {
            throw new BadRequestHttpException('Invalid parameter userId');
        }

        if (false === $request->request->has('timestamp')) {
            throw new BadRequestHttpException('Missing parameter timestamp: must be a UUID');
        }
        $timestamp = $request->get('timestamp');
        if (false === is_int($timestamp)) {
            throw new BadRequestHttpException('Invalid parameter timestamp: must be an integer');
        }

        // @todo something with your data

        return $this->json(["success" => true]);
    }
}
