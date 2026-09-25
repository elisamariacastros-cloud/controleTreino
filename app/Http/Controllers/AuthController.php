<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $dados = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $aluno = Aluno::where('email', $dados['email'])->first();

        if (! $aluno || ! Hash::check($dados['password'], $aluno->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $token = $aluno->createToken('app-flutter')->plainTextToken;

        return response()->json([
            'token' => $token,
            'aluno' => $aluno,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso.']);
    }
}