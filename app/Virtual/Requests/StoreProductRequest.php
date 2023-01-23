<?php

namespace App\Virtual\Requests;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      title="Store Recipe request",
 *      description="Store Recipe request body data",
 *      type="object",
 *      required={"name"}
 * )
 */

class StoreProductRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the new Recipe",
     *      example="A nice Recipe"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the new Recipe",
     *      example="This is new Recipe's description"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="Stock",
     *      description="Stock of the product, allowed to be null",
     *      example="5"
     * )
     *
     * @var int
     */
    public int $stock;

    /**
     * @OA\Property(
     *      title="Purchase Price",
     *      description="Purchase price of the product",
     *      example="10"
     * )
     *
     * @var float
     */
    public float $purchase_price;

    /**
     * @OA\Property(
     *      title="Selling Price",
     *      description="Selling price of the product",
     *      example="23.75"
     * )
     *
     * @var float
     */
    public float $selling_price;

    /**
     * @OA\Property(
     *      title="Image Url",
     *      description="Image URL of the product",
     * )
     *
     * @var string
     */
    public string $image_url;
}
