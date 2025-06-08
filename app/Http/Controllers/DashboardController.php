<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControleDeEstoque;

class DashboardController extends Controller
{
    public function index()
    {
        $materiais = ControleDeEstoque::select('descricao', 'em_estoque')
            ->orderBy('descricao')
            ->get();

        $nomes = $materiais->pluck('descricao')->toArray();      // Ex: ['Caneta', 'Papel']
        $quantidades = $materiais->pluck('em_estoque')->toArray(); // Ex: [120, 300]

        return view('dashboard', compact('nomes', 'quantidades'));
    }
}

