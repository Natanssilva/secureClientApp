<?php

use App\Http\Controllers\RecoverPassword;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(){
    return "gansobass";
}); //rota principal, onde provavel que eu vá lançar os pedidos

Route::post('/users', [UserController::class, 'signIn']); //Rota para cadastro de novos usuários
Route::post('/login', [UserController::class, 'login']); //Rota para verificar se existe login usuários
Route::post('/password/forgot', [RecoverPassword::class, 'sendResetLink']); 
Route::post('/password/reset', [RecoverPassword::class, 'resetPassword']);


