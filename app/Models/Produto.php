<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    public function categorias(): HasOne
    {
        return $this->hasOne(Categorias::class, 'id', 'categoria_id');
    }
}
