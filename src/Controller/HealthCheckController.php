<?php

namespace App\Controller;

use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
final readonly class HealthCheckController
{
    #[Route(path: '/status', name: 'health_check', methods: [Request::METHOD_GET])]
    #[OA\Get(
        path: '/api/v1/status',
        summary: 'Ping for health check',
        description: 'Simple ping to check if API is healthy',
        responses: [
            new OA\Response(
                response: Response::HTTP_OK,
                description: 'API is healthy',
                content: null
            ),
        ]
    )]
    #[OA\Tag(name: 'HealthCheck')]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(null, Response::HTTP_OK);
    }
}
