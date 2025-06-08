<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Exibe o formulário de criação de fornecedor.
     */
    public function create()
    {
        return view('fornecedores.cadastro_de_fornecedor');
    }

    /**
     * Salva um novo fornecedor no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:fornecedores,cnpj',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:fornecedores,email',
        ]);

        Fornecedor::create($request->all());

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor adicionado com sucesso!');
    }

    /**
     * Exibe a lista de fornecedores.
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return view('fornecedores.exibirFornecedores', compact('fornecedores'));
    }

    /**
     * Exibe o formulário de edição de um fornecedor.
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view('fornecedores.edit', compact('fornecedor'));
    }

    /**
     * Atualiza um fornecedor no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:fornecedores,cnpj,' . $id,
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:fornecedores,email,' . $id,
        ]);

        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor atualizado com sucesso!');
    }

    /**
     * Remove um fornecedor do banco de dados.
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('fornecedores.index')->with('success', 'Fornecedor excluído com sucesso!');
    }
}
