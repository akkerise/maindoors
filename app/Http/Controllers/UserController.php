<?php

namespace App\Http\Controllers;


use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use JWTAuthException;
use Hash;
use App\Repositories\UserRepositories\Eloquents\UserRepository;
use App\Services\UserService;
use Auth;

class UserController extends Controller
{
    private $user;
    private $userService;
    private $userRepository;

    public function __construct(User $user, UserService $userService, UserRepository $userRepository)
    {
        $this->user = $user;
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    public function register(Request $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            foreach ($data as $k => $v) {
                if ($v === null) {
                    unset($data[$k]);
                }
            }

            $user = $this->user->create($data);

        } catch (PDOException $exception) {
            dd($exception->getMessage());
        }

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_email_or_password'], 422);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }

        try {
            $this->user->where(['email' => $request->email])->update(['api_token' => $token]);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
        return response()->json(compact('token'));
    }

    public function getAuthUser(Request $request)
    {
        $user = JWTAuth::toUser($request->token);
        return response()->json(['data' => $user]);
    }

    public function updateUser(Request $request, $id)
    {
        if (!JWTAuth::authenticate($request->token)) {
            return response()->json(['token_is_invalid'], 422);
        }

        try {
            $user = JWTAuth::toUser($request->token);
            $data = $request->all();

            foreach ($data as $k => $v) {
                if ($v === null || $k === 'token') {
                    unset($data[$k]);
                }
            }

            $this->user->where(['id' => $id])->update($data);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully',
            'data' => $data
        ]);
    }

    public function getUserById(Request $request, $id)
    {
        if (!JWTAuth::authenticate($this->userRepository->findId($id)->api_token)) {
            return response()->json(['token_is_invalid'], 422);
        }

        $data = $this->userService->getUserByApiJWT($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Username have id not invalid $id : ' . $id,
            ]);
        }
        return response()->json([
            'status' => 200,
            'success' => true,
            'data' => $data
        ]);
    }

    // public function getAllUser(Request $request, $id)
    // {
    //     if (!JWTAuth::authenticate($this->userRepository->findId($id)->api_token)) {
    //         return response()->json(['token_is_invalid'], 422);
    //     }
        
    //     $data = $this->userService->getUserByApiJWT($id);

    //     if (!$data) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Username have id not invalid $id : ' . $id,
    //         ]);
    //     }
    //     return response()->json([
    //         'status' => 200,
    //         'success' => true,
    //         'data' => $data
    //     ]);
    // }
}