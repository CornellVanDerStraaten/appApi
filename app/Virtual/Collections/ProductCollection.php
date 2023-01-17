<?php

namespace App\Virtual\Collections;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="ProjectCollection",
 *     description="Project Collection",
 *     @OA\Xml(
 *         name="ProjectCollection"
 *     )
 * )
 */
class ProductCollection
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Product[]
     */
    private $data;
}
