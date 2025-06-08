<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    // Especificando o nome da tabela
    protected $table = 'fornecedores';

    // Se necessário, você também pode definir os campos que podem ser preenchidos diretamente
    protected $fillable = ['nome', 'cnpj', 'endereco', 'telefone', 'email'];
}
