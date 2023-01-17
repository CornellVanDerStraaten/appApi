<?php

namespace App\Virtual\Resources;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="ProductResource",
 *     description="product resource",
 *     @OA\Xml(
 *         name="productResource"
 *     )
 * )
 */
class ProductResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Product
     */
    private $data;
}
