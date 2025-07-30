<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';  // Nome da tabela no banco
    protected $fillable = ['nome', 'email', 'senha']; // Colunas que pode popular

    public $timestamps = false; // Se a tabela não usar created_at/updated_at
}
