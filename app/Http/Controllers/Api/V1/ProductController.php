<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\productResource;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Annotations as OA;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * @OA\Get(
     *      path="/product",
     *      operationId="getProductList",
     *      tags={"Products"},
     *      summary="Get list of products",
     *      description="Returns list of products",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProductCollection")
     *       ),
     *     )
     */
    public function index()
    {
        return new ProductResource(Product::all());
    }


    /**
     * @OA\Post(
     *      path="/product",
     *      operationId="storeProduct",
     *      tags={"Products"},
     *      security={ {"sanctum": {} }},
     *      summary="Store new product",
     *      description="Returns product data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreProductRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProductResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthorizedException")
     *      ),
     * )
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::query()->create($request->all());

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * @OA\Get(
     *      path="/product/{id}",
     *      operationId="getProductById",
     *      tags={"Products"},
     *      summary="Get product information",
     *      description="Returns product data",
     *      @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProductResource")
     *       ),
     *       @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *       @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="404"),
     *             @OA\Property(property="error",type="string", example="product not found")
     *          )
     * ),
     * )
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'error' => 'product not found',
            ]);
        }

        return new ProductResource($product);
    }

    /**
     * @OA\Put(
     *      path="/product/{id}",
     *      operationId="updateProduct",
     *      tags={"Products"},
     *      security={ {"sanctum": {} }},
     *      summary="Update existing product",
     *      description="Returns updated product data",
     *      @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreProductRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/ProductResource")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthorizedException")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *       @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="404"),
     *             @OA\Property(property="message",type="string", example="product not found")
     *          )
     * ),
     * )
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return (new productResource($product))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }


    /**
     * @OA\Delete(
     *      path="/product/{id}",
     *      operationId="deleteProduct",
     *      tags={"Products"},
     *      security={ {"sanctum": {} }},
     *      summary="Delete existing product",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="status", type="integer", example="200"),
     *              @OA\Property(property="message", type="string", example="product deleted"),
     * )
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthorizedException")
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *       @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="404"),
     *             @OA\Property(property="message",type="string", example="product not found")
     *          )
     * ),
     *      )
     * )
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 404,
                'message' => 'product not found',
            ]);
        }

        $product->delete();

        return response()->json([
            'status' => 200,
            'message' => 'product deleted',
        ]);
    }
}
