<?php

namespace App\Http\Controllers;

use App\Models\TypeUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type_user_fk' => 'required|int',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type_user_fk' =>  $request->type_user_fk,
        ]);

        // Geração do token para o usuário registrado
        $token = $user->createToken('LaravelPassportToken')->accessToken;

        return response()->json([
            'message' => 'Usuário registrado com sucesso!',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    // Método para login de usuários
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Verificação das credenciais
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        // Geração do token para o usuário autenticado
        $user = Auth::user();
        $token = $user->createToken('LaravelPassportToken')->accessToken;
        $type = TypeUser::where("id", $user->type_user_fk)->first();

        $user["type_user"] = $type;
        return response()->json([
            'message' => 'Login realizado com sucesso!',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $success['user_id'] = $user->id;
        $success['revoked'] = $user->token()->revoke();
        return response()->json([
            'message' => 'Usuário deslogado com suceso!',
        ], 200);
    }
}
