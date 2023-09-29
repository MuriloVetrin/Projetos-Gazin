<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    protected $fillable = ['cliente_id', 'produto_id', 'quantidade'];

    public function produto()
    {
        return $this->belongsTo('App\Produto');
    }
}

