<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntradaEstoque extends Model
{
    use HasFactory;

    protected $table = 'entradas_estoque'; // <- nome certo da tabela

    protected $fillable = [
        'controle_de_estoque_id',
        'fornecedor_id',
        'deposito_id',
        'quantidade',
        'data_entrada',
    ];

    public function material()
    {
        return $this->belongsTo(ControleDeEstoque::class, 'controle_de_estoque_id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function deposito()
    {
        return $this->belongsTo(Deposito::class);
    }
}
