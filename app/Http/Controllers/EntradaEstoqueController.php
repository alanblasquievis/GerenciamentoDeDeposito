<?php

namespace App\Http\Controllers;

use App\Models\EntradaEstoque;
use App\Models\ControleDeEstoque;
use App\Models\Fornecedor;
use App\Models\Deposito;
use Illuminate\Http\Request;

class EntradaEstoqueController extends Controller
{
    public function index()
{
    $sort = request('sort', 'data_entrada');
    $order = request('order', 'desc');

    $entradas = EntradaEstoque::with(['material', 'fornecedor', 'deposito'])
        ->orderBy($sort, $order)
        ->paginate(10);

    return view('entradas_estoque.index', compact('entradas'));
}

    public function create()
    {
        // Busca os materiais únicos para seleção no formulário
        $materiais = ControleDeEstoque::select('id', 'material', 'descricao')
            ->orderBy('descricao')
            ->get();

        $fornecedores = Fornecedor::all();
        $depositos = Deposito::all();

        return view('entradas_estoque.create', compact('materiais', 'fornecedores', 'depositos'));
    }

    public function store(Request $request)
{
    $request->validate([
        'controle_de_estoque_id' => 'required|exists:controle_de_estoque,id',
        'fornecedor_id' => 'required|exists:fornecedores,id',
        'deposito_id' => 'nullable|exists:depositos,id',
        'quantidade' => 'required|integer|min:1',
        'data_entrada' => 'required|date',
    ]);

    $entradaDepositoId = $request->deposito_id;
    if (is_null($entradaDepositoId)) {
        $deposito = Deposito::where('codigo', 'dep-ger')->first();
        $entradaDepositoId = $deposito ? $deposito->id : null;
    }

    EntradaEstoque::create([
        'controle_de_estoque_id' => $request->controle_de_estoque_id,
        'fornecedor_id' => $request->fornecedor_id,
        'deposito_id' => $entradaDepositoId,
        'quantidade' => $request->quantidade,
        'data_entrada' => $request->data_entrada,
    ]);

    $material = ControleDeEstoque::findOrFail($request->controle_de_estoque_id);

    // Atualiza depósito se estiver vazio
    if (is_null($material->deposito_id) && $entradaDepositoId) {
        $material->deposito_id = $entradaDepositoId;
        $material->save();
    }

    // Incrementa o estoque
    $material->increment('em_estoque', $request->quantidade);

    return redirect()->route('entradas_estoque.index')->with('success', 'Entrada registrada com sucesso!');
}
}
