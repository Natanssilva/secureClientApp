<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function signIn(Request $request){ //método de cadastro de usuarios

        try {

            $rules_validate = $request->validate([
                "nome" => "bail|required|string|max:100",
                "sobrenome" => "nullable|string|max:100",
                "email" => "required||email|unique:users,email|string|max:150",
                "senha" => "required|string|max:200",
            ]);

            $rules_validate['senha'] = Hash::make($rules_validate['senha']);
    
            $new_user = User::create($rules_validate);

            return response()->json(["status" => "success", "data" => $new_user],201);

        } catch (ValidationException $e) {

            return response()->json([
                'message' => 'Erro de validação.',
                'errors' => $e->getMessage(), // Retorna os erros de validação
            ], 422); 

        }
        
    }

    public function login(Request $request){ 
        
    }
}
