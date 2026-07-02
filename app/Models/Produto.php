<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    //nome da tabela
    protected $table = 'produtos';

    //funcão para criar relacionamentos
    public function user()
    {
        
        return $this->belongsTo(User::class, 'id_user');
        
    }
    
}
