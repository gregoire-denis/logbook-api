<?php

use App\Controller\HealthCheckController;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

#[CoversClass(HealthCheckController::class)]
final class HealthCheckControllerTest extends TestCase
{
    public function test_invoke_will_return_json_response_200(): void
    {
        // Given
        $dummyController = new HealthCheckController;

        // When
        $response = $dummyController();

        // Then
        self::assertInstanceOf(JsonResponse::class, $response);
        self::assertEquals($response->getStatusCode(), Response::HTTP_OK);
        self::assertSame($response->getContent(), '{}');
    }
}
