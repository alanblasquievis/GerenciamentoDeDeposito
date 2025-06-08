<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deposito;
use App\Models\Estabelecimento;

class ControleDeEstoque extends Model
{
    use HasFactory;

    protected $table = 'controle_de_estoque';

    protected $fillable = ['material', 'descricao', 'estabelecimento_id', 'tipo', 'em_estoque', 'deposito_id'];

    public function estabelecimento()
    {
        return $this->belongsTo(Estabelecimento::class, 'estabelecimento_id');
    }

    public function deposito()
    {
        return $this->belongsTo(Deposito::class, 'deposito_id');
    }
}
