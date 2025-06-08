<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estabelecimento extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($deposito) {
            $deposito->codigo = 'r' . str_pad($deposito->rua, 2, '0', STR_PAD_LEFT) .
                                'g' . str_pad($deposito->gondola, 2, '0', STR_PAD_LEFT);
        });
    }
}
