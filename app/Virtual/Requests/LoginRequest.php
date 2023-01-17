<?php

namespace App\Virtual\Requests;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="Login request",
 *      description="Login request body data",
 *      type="object",
 *      required={"email", "password", "device_name"}
 * )
 */

class LoginRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the user",
     *      example="user@email.com"
     * )
     *
     * @var string
     */
    public string $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="Password of the user made in sha256 hash",
     * )
     *
     * @var string
     */
    public string $password;

    /**
     * @OA\Property(
     *      title="device_name",
     *      description="Name of the device of the user, used for identifation purposes and generating the token",
     * )
     *
     * @var string
     */
    public string $device_name;
}
