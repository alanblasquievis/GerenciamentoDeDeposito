<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use Illuminate\Http\Request;

class DepositoController extends Controller
{
    public function index()
    {
        $depositos = Deposito::all();
        return view('depositos.index', compact('depositos'));
    }

    public function create()
    {
        return view('depositos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rua' => 'required|numeric|min:0',
            'gondola' => 'required|numeric|min:0',
        ]);

        Deposito::create([
            'rua' => $request->rua,
            'gondola' => $request->gondola,
        ]);

        return redirect()->route('depositos.index')->with('success', 'Depósito cadastrado com sucesso!');
    }

    public function destroy($id)
    {
        $deposito = Deposito::findOrFail($id);
        $deposito->delete();

        return redirect()->route('depositos.index')->with('success', 'Depósito removido com sucesso!');
    }
}
