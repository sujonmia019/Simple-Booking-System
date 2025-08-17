<?php

namespace App\Swagger;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Service Booking API",
 *     version="1.0.0",
 *     description="API documentation for Service Booking System",
 *     @OA\Contact(
 *         email="sujonbdjoin019@gmail.com"
 *     )
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Local API server"
 * )
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Live API server"
 * )
 *
 * @OA\Tag(
 *     name="Auth",
 *     description="Authentication endpoints"
 * )
 *
 * @OA\Tag(
 *     name="Customer",
 *     description="Customer endpoints"
 * )
 *
 * @OA\Tag(
 *     name="Admin",
 *     description="Admin endpoints"
 * )
 */
class SwaggerInfo
{

}
