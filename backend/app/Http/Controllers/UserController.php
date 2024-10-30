<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function signIn(Request $request)
    { //método de cadastro de usuarios

        try {
            $rules_validate = $request->validate([
                "nome" => "bail|required|string|max:100",
                "sobrenome" => "nullable|string|max:100",
                "email" => "required||email|unique:users,email|string|max:150",
                "senha" => "required|string|max:200",
            ]);

            $rules_validate['senha'] = Hash::make($rules_validate['senha']);

            $new_user = User::create($rules_validate);

            return response()->json(["status" => "success", "data" => $new_user], 201);
        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $e->getMessage(), // Retorna os erros de validação
            ], 422);
        }
    }

    public function login(Request $request)
    {
        if(empty($request->all())){ 
            return response()->json([
                'status' => 'erro',
                'user' => "Erro na requisição."
            ], 400); 
        }
    
        // Validação dos campos de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $verify_fields = $request->only('email', 'password');
        $user = User::where('email', $verify_fields['email'])->first();
    
        // Se o usuário é válido e a senha está correta
        if ($user && Hash::check($verify_fields['password'], $user->senha)) {
            return response()->json([
                'status' => 'success',
                'user' => "Bem-vindo, {$user->nome}."
            ], 200);
        }
    
        // Caso o usuário exista, mas a senha está incorreta
        if ($user) {
            return response()->json([
                'status' => 'error',
                'msg' => 'Senha incorreta, digite novamente.'
            ], 401); 
        }
    
        // Se o usuário não for encontrado
        return response()->json([
            'status' => 'error',
            'msg' => 'Usuário não cadastrado no sistema.'
        ], 401); 
    }
    
}
