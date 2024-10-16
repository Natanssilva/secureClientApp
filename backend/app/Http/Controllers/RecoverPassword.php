<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetEmail;
use App\Models\ForgetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Exception;
use Illuminate\Support\Str;

class RecoverPassword extends Controller
{
    public function sendResetLink(Request $request)
    {

        $request->validate(["email" => "required|email"]);

        $user = User::where("email", $request->email)->first(); //procurar usuario com email que ta tentando redefinir senhas
        
        
        if (!empty($user)) {  //usuario encontrado no databasae
            $token_password = Str::random(60); // Gera um token de 60 caracteres
            $expiresAt = now()->addMinutes(60);
            
            ForgetPassword::updateOrCreate(
                ['email' => $request->email],
                ['token' =>  Hash::make($token_password),
                'expires_at' => $expiresAt ]
            );

            $nom_usuario = trim("{$user->nome} {$user->sobrenome}");
            $link = url('/reset-password/' . $token_password);
            $horario = date('H');
           
            $saudacao = match (true) {
                $horario >= 5 && $horario < 12 => "Bom dia", // De 5h até 12h
                $horario >= 12 && $horario < 18 => "Boa tarde", // De 12h até 18h
                ($horario >= 18 && $horario <= 23) || ($horario >= 0 && $horario < 5) => "Boa noite", // De 18h até 5h
                default => "Olá", // Para lidar com qualquer horário inválido (opcional)
            };
          
            try {
                Mail::to($request->email)->send(new PasswordResetEmail($request->email,$nom_usuario,$link,$saudacao, date('d/m/Y')));
            } catch (Exception $e) {
                return redirect()->back()->with([
                    'success' => false,
                    'message' => 'Email não enviado!. Erro: ' . $e->getMessage()
                ]);
            }


            return response()->json(["status" =>"success", "message" => "E-mail enviado para $request->email."],200);
        }

        return response()->json(["status" => "error", "message" => "Usuário não encontrado na base de dados."], 404);
    }
    public function resetPassword(Request $request) {
        
    }
}
