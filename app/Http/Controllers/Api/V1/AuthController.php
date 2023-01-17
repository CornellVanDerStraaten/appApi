<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use OpenApi\Annotations as OA;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     * path="/login",
     * operationId="authLogin",
     * tags={"Login"},
     * summary="User Login",
     * description="Login User Here",
     *     @OA\RequestBody(
     *     required=true,
     *     @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="Login Successfully",
     *          @OA\JsonContent(ref="#/components/schemas/LoginResource")
     *       ),
     *      @OA\Response(
     *     response=400,
     *     description="Login failed",
     *       @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="400"),
     *             @OA\Property(property="message",type="string", example="Incorrect email or password")
     *          )
     * ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(ref="#/components/schemas/UnauthorizedException")
     *      ),
     * )
     */
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! $request->password == $user->password) {
            return response()->json([
                'status' => 400,
                'message' => 'Incorrect email or password',
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User succesfully logged in',
            'token' => $user->createToken($request->device_name)->plainTextToken,
        ]);
    }
}
