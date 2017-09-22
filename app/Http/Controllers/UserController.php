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

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {
        try {

            $user = $this->user->create([
                'fullname' => $request->fullname,
                'username' => $request->username,
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'confirm_code' => md5($request->fullname . $request->email),
                'address' => $request->address,
                'gender' => $request->gender,
                'description' => $request->description,
                'total_money' => $request->total_money,
                'confirmed' => $request->confirmed,
                'level' => $request->level
            ]);

        } catch (PDOException $exception) {
            dd($exception->getMessage());
        }

        return response()->json([
            'status' => 200,
            'message' => 'User created successfully',
            'data' => $user
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
            $this->user->where(['email' => $request->email])->update(['remember_token' => $token]);
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
}