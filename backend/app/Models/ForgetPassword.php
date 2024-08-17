<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgetPassword extends Model
{
    use HasFactory; 

    protected $fillable = [
        'email',
        'token'
    ];

    protected $primaryKey = 'email';  // Define o campo `email` como chave primária
    public $incrementing = false;     // Informa que a chave primária não é auto-incrementável
    protected $keyType = 'string'; 
}
