<?php

namespace App\Virtual\Resources;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="LoginResource",
 *     description="Login resource",
 *     @OA\Xml(
 *         name="LoginResource"
 *     )
 * )
 */
class LoginResource
{
    /**
     * @OA\Property(
     *     title="Status code",
     *     description="Status code, either 200 or 400",
     *     example=200
     * )
     *
     * @var int
     */
    private $status;

    /**
     * @OA\Property(
     *     title="Token",
     *     description="If login correct, token",
     *     example="2e2fd7acefedf6f7b20875dcb2f97e221d3057ab8d4da40ea4cd428bcd705354"
     * )
     *
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="Token",
     *     description="If login correct, token",
     *     example="2e2fd7acefedf6f7b20875dcb2f97e221d3057ab8d4da40ea4cd428bcd705354"
     * )
     *
     * @var string
     */
    private $token;
}
