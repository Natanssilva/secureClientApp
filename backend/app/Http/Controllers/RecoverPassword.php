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

    /**
     * Função que envia Email com Link de recuperação de senha
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function sendResetLink(Request $request)
    {

        $request->validate(["email" => "required|email"]);

        $user = User::where("email", $request->email)->first(); //procurar usuario com email que ta tentando redefinir senhas

        if (empty($user)) {  //usuario não encontrado no databasae
            return response()->json(["status" => "error", "message" => "Usuário não encontrado na base de dados."], 404);
        }

        $token_password = Str::random(60); // Gera um token de 60 caracteres
        $expiresAt = now()->addMinutes(60);

        ForgetPassword::updateOrCreate(
            ['email' => $request->email],
            [
                'token' =>  Hash::make($token_password),
                'expires_at' => $expiresAt
            ]
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
            Mail::to($request->email)->send(new PasswordResetEmail($request->email, $nom_usuario, $link, $saudacao, date('d/m/Y')));
        } catch (Exception $e) {
            return redirect()->back()->with([
                'success' => false,
                'message' => 'Email não enviado!. Erro: ' . $e->getMessage()
            ]);
        }


        return response()->json(["status" => "success", "message" => "E-mail enviado para $request->email."], 200);
    }


    /**
     * Função que valida o Token de redefinição de senha por usuário
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function validateToken(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email'
        ]);

        $registerEmail = ForgetPassword::where('email', $request->email);

        if (empty($registerEmail)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Nenhum usuário com esse email foi encontrado.'
            ], 400);
        }

        /**
         * Verificando se o token de redefinição de senha ainda é valido
         * Verifica se a data atual é maior que o tempo definido no campo do database
         */
        if (now()->greaterThan($registerEmail->expires_at)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token de redefinição de senha expirado.'
            ], 400);
        }

        // Verificar se o token recebido no request é válido
        if (!Hash::check($request->token, $registerEmail->token)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Token inválido.'
            ], 400);
        }

        // Se o token for válido, redirecionar para a página de redefinição de senha no frontend
        return response()->json([
            'status' => 'success',
            'message' => 'Token válido. Redirecionando para a página de redefinição de senha.',
            'redirect_url' => url('/reset-password-page') 
        ], 200);
    }

    public function resetPassword(Request $request){
        $this->validateToken($request);

        /**
         * Criar Refinição de senha no banco de dados
         */
    }
}
