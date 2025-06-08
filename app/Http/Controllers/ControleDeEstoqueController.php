<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use App\Models\ControleDeEstoque;
use App\Models\Deposito;
use Illuminate\Http\Request;

class ControleDeEstoqueController extends Controller
{
    // Form para criar novo material
    public function create()
    {
        $estabelecimentos = Estabelecimento::all();
        return view('estoque.cadastro_de_material', compact('estabelecimentos'));
    }

    // Armazenar novo material
    public function store(Request $request)
    {
        $request->validate([
            'material' => 'required|numeric',
            'descricao' => 'required|string|max:255',
            'estabelecimento_id' => 'required|exists:estabelecimentos,id',
            'tipo' => 'nullable|string',
        ]);

        $depositoPadrao = Deposito::where('codigo', 'dep-ger')->first();

        ControleDeEstoque::create([
            'material' => $request->material,
            'descricao' => $request->descricao,
            'estabelecimento_id' => $request->estabelecimento_id,
            'tipo' => $request->tipo,
            'em_estoque' => 0,
            'deposito_id' => $depositoPadrao?->id, // dep-ger padrão
        ]);

        return redirect()->route('estoque.index')->with('success', 'Material adicionado com sucesso!');
    }

    // Listar todos materiais
    public function index()
    {
        $materiais = ControleDeEstoque::with('deposito')->get();
        return view('estoque.ExibirEstoque', compact('materiais'));
        
    }

    // Form para editar material
    public function edit($id)
    {
        $material = ControleDeEstoque::findOrFail($id);
        $estabelecimentos = Estabelecimento::all();
        return view('estoque.edit', compact('material', 'estabelecimentos'));
    }

    // Atualizar material
    public function update(Request $request, $id)
    {
        $request->validate([
            'material' => 'required|numeric',
            'descricao' => 'required|string|max:255',
            'estabelecimento_id' => 'required|exists:estabelecimentos,id',
            'tipo' => 'nullable|string',
        ]);

        $material = ControleDeEstoque::findOrFail($id);

        $material->update([
            'material' => $request->material,
            'descricao' => $request->descricao,
            'estabelecimento_id' => $request->estabelecimento_id,
            'tipo' => $request->tipo,
        ]);

        return redirect()->route('estoque.index')->with('success', 'Material atualizado com sucesso!');
    }

    // Excluir material
    public function destroy($id)
    {
        $material = ControleDeEstoque::findOrFail($id);
        $material->delete();

        return redirect()->route('estoque.index')->with('success', 'Material excluído com sucesso!');
    }

    // Formulário para transferir material (mostrar um material e depósitos)
   public function transferForm($id)
{
    $material = ControleDeEstoque::findOrFail($id);
    $depositos = Deposito::all();
    $materiais = ControleDeEstoque::with('deposito')->get();  // carregar todos os materiais com depósito

    return view('materiais.transferir', compact('material', 'depositos', 'materiais'));
}
    // Processar transferência do material para outro depósito
    public function transfer(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:controle_de_estoque,id',
            'novo_deposito_id' => 'required|exists:depositos,id',
        ]);

        $material = ControleDeEstoque::findOrFail($request->material_id);
        $material->deposito_id = $request->novo_deposito_id;
        $material->save();

        // Redireciona para a listagem ou para o próprio formulário de transferência com sucesso
        return redirect()->route('estoque.index')->with('success', 'Depósito transferido com sucesso!');
    }
    
}
