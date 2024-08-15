<?php

namespace App\Http\Controllers;

use App\Models\ForgetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RecoverPassword extends Controller
{

    public function sendResetLink(Request $request)
    {

        $request->validate(["email" => "required|email"]);

        $user = User::where("email", $request->email)->first(); //procurar usuario com email que ta tentando redefinir senhas

        if (!empty($user)) {  //usuario encontrado no database
            $token_password = Hash::make(bin2hex(random_bytes(32)));

            showArray([
                "token_password" => $token_password,
            ]);

            ForgetPassword::table('forget_passwords')->insert([
                'email' => $request->email,
                'token' => $token_password,
            ]);

            // Envia o email com o token

            // params> view(corpo email), dados passados para view(token), callback de config email
            Mail::send('emails.reset-password', ['token' => $token_password], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Link para redefinição de senha');
            });
        }

        return response()->json(["status" => "error", "message" => "Usuário não encontrado na base de dados."], 404);
    }
    public function resetPassword(Request $request) {}
}
