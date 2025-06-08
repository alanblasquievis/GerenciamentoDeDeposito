<?php

namespace App\Http\Controllers;

use App\Models\ControleDeEstoque;
use App\Models\Estabelecimento;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\EstoquePorEstabelecimento;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservaController extends Controller
{
    public function index()
{
    $reservas = Reserva::where('quantidade', '>', 0)
        ->with('material')
        ->latest()
        ->get();

    return view('reservas.index', compact('reservas'));
}

    public function criar()
    {
        // Carregar materiais únicos, evitando repetição
        $materiais = ControleDeEstoque::distinct()->get();
        return view('reservas.criar', compact('materiais'));
    }

    public function visualizar()
    {
        $reservas = Reserva::all(); // Obter todas as reservas
        return view('reservas.visualizar', compact('reservas')); // Retorna a view com as reservas
    }

    public function store(Request $request)
    {
        // Validação
        $validated = $request->validate([
            'material_id' => 'required|exists:controle_de_estoque,id',
            'quantidade' => 'required|integer|min:1',
        ]);

        // Gerar número de reserva único
        $ultimoNumeroReserva = Reserva::latest()->first(); // Pega a última reserva inserida
        $ultimoNumero = $ultimoNumeroReserva ? $ultimoNumeroReserva->numero_reserva : 'RES000';

        // Incrementa o número da reserva
        $numeroReserva = 'RES' . str_pad(substr($ultimoNumero, 3) + 1, 4, '0', STR_PAD_LEFT);

        // Criar a reserva
        $reserva = new Reserva();
        $reserva->material_id = $request->input('material_id');
        $reserva->quantidade = $request->input('quantidade');
        $reserva->numero_reserva = $numeroReserva; // Número da reserva gerado
        $reserva->save();

        // Retorna para a página de index com a mensagem de sucesso
        return redirect()->route('reservas.index')->with('success', 'Reserva ' . $numeroReserva . ' criada com sucesso!');
    }

    public function consumir()
{
    // Buscar apenas reservas com quantidade > 0
    $reservas = Reserva::with('material')
        ->where('quantidade', '>', 0)
        ->get();

    return view('reservas.consumir', compact('reservas'));
}

    public function storeConsumo(Request $request, Reserva $reserva)
{
    // Validação
    $validated = $request->validate([
        'quantidade' => 'required|integer|min:1|max:' . $reserva->quantidade,
    ]);

    $quantidadeConsumida = $request->input('quantidade');
    $material = $reserva->material;

    // Verifica se há estoque suficiente ANTES de descontar
    if ($material->em_estoque < $quantidadeConsumida) {
        return redirect()->back()->with('error', 'Estoque insuficiente para o material: ' . $material->descricao);
    }

    // Desconta do estoque e da reserva
    $material->em_estoque -= $quantidadeConsumida;
    $material->save();

    $reserva->quantidade -= $quantidadeConsumida;
    $reserva->save();

    return redirect()->route('reservas.consumir')->with('success', 'Reserva consumida e estoque atualizado com sucesso!');
}

public function destroy($id)
{
    $reserva = Reserva::findOrFail($id);
    $reserva->delete();

    return redirect()->route('reservas.index')->with('success', 'Reserva excluída com sucesso!');
}

public function gerarPDF()
{
    $reservas = Reserva::with('material.deposito')->get();
    $pdf = Pdf::loadView('reservas.pdf', compact('reservas'));

    return $pdf->download('relatorio_reservas.pdf');
}

public function relatorioConsumos()
{
    // Busca todas as reservas já consumidas
    $consumos = Reserva::where('consumido', true)->with('material.deposito')->get();

    return view('relatorios.consumos', compact('consumos'));
}

}
