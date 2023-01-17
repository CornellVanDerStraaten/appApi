<?php

namespace App\Virtual;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Unauthorized Exception",
 *     description="Standard unauthorized exception, given when token invalid or not existing",
 *     @OA\Xml(
 *         name="Unauthorized Exception"
 *     )
 * )
 */
class UnauthorizedException
{
    /**
     * @OA\Property(
     *     title="Status code",
     *     description="Status code 401",
     *     example=401
     * )
     *
     * @var int
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Message",
     *     example="Unauthorized"
     * )
     *
     * @var string
     */
    private $message;
}
