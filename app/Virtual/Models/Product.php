<?php

namespace App\Virtual\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product model",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 */
class Product
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private int $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new product",
     *      example="Hair curler"
     * )
     *
     * @var string
     */
    public string $name;

    /**
     * @OA\Property(
     *      title="Description",
     *      description="Description of the new product",
     *      example="This is new product's description"
     * )
     *
     * @var string
     */
    public string $description;

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

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;
}
