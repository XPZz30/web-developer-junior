<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Models\Eloquent\User;  // Importa a model User

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['user_id', 'title', 'image', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public $timestamps = false;
}
