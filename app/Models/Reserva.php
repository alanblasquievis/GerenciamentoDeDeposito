<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ControleDeEstoque;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = ['material_id', 'quantidade'];

    public function material()
    {
        return $this->belongsTo(ControleDeEstoque::class, 'material_id');
    }
}
