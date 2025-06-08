<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ControleDeEstoqueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MercadoriaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EntradaEstoqueController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\DepositoController;
use App\Models\ControleDeEstoque;
use App\Http\Controllers\DashboardController;

// Rota inicial (login)
Route::get('/', function () {
    return view('auth.login');
});

// Rotas protegidas por autenticação
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Cadastro de Material
    Route::get('/cadastro_de_material', [ControleDeEstoqueController::class, 'create'])->name('cadastro_de_material');

    // Cadastro de Fornecedor
    Route::get('/cadastro_de_fornecedor', [FornecedorController::class, 'create'])->name('cadastro_de_fornecedor');

    // Exibir Estoque (view)
    Route::get('/exibirEstoque', function () {
        return view('estoque.ExibirEstoque');
    })->name('exibirEstoque');

    // Gerenciamento de perfil
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Rotas de Estoque
    Route::prefix('estoque')->group(function () {
        // Listar todos os materiais
        Route::get('/', [ControleDeEstoqueController::class, 'index'])->name('estoque.index');

        // Formulário para adicionar material
        Route::get('/create', [ControleDeEstoqueController::class, 'create'])->name('estoque.create');

        // Salvar novo material
        Route::post('/', [ControleDeEstoqueController::class, 'store'])->name('estoque.store');

        // Formulário para edição de um material (requires ID)
        Route::get('/{id}/edit', [ControleDeEstoqueController::class, 'edit'])->name('estoque.edit');

        // Atualizar material (requires ID)
        Route::put('/{id}', [ControleDeEstoqueController::class, 'update'])->name('estoque.update');

        // Excluir material (requires ID)
        Route::delete('/{id}', [ControleDeEstoqueController::class, 'destroy'])->name('estoque.destroy');
    });

    // Exibir Estoque via Controller
    Route::get('/exibirEstoque', [ControleDeEstoqueController::class, 'index'])->name('exibirEstoque');

    // Rotas de Fornecedores
    Route::prefix('fornecedores')->group(function () {
    // Listar todos os fornecedores
    Route::get('/', [FornecedorController::class, 'index'])->name('fornecedores.index');

    // Formulário para adicionar fornecedor
    Route::get('/create', [FornecedorController::class, 'create'])->name('fornecedores.create');

    // Salvar novo fornecedor
    Route::post('/', [FornecedorController::class, 'store'])->name('fornecedores.store');

    // Formulário para edição de um fornecedor (requires ID)
    Route::get('/{id}/edit', [FornecedorController::class, 'edit'])->name('fornecedores.edit');

    // Atualizar fornecedor (requires ID)
    Route::put('/{id}', [FornecedorController::class, 'update'])->name('fornecedores.update');

    // Excluir fornecedor (requires ID)
    Route::delete('/{id}', [FornecedorController::class, 'destroy'])->name('fornecedores.destroy');
    });

    // Exibir Estoque via Controller
    Route::get('/exibirFornecedores', [FornecedorController::class, 'index'])->name('exibirFornecedores');

});

    Route::prefix('entradas_estoque')->group(function () {
        Route::get('/', [EntradaEstoqueController::class, 'index'])->name('entradas_estoque.index');
        Route::get('/create', [EntradaEstoqueController::class, 'create'])->name('entradas_estoque.create');
        Route::post('/', [EntradaEstoqueController::class, 'store'])->name('entradas_estoque.store');
    });

    Route::get('/deposito/{id}', function ($id) {
        $deposito = App\Models\Deposito::find($id);
        return response()->json(['rua' => $deposito->rua]);
    });

    //reservas
    Route::prefix('reservas')->group(function () {
        Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
        Route::get('/reservas/criar', [ReservaController::class, 'criar'])->name('reservas.criar');
        Route::get('/reservas/modificar', [ReservaController::class, 'modificar'])->name('reservas.modificar');
        Route::get('reservas/visualizar', [ReservaController::class, 'visualizar']);
        Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
        Route::delete('reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
        Route::get('reservas/{id}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
        Route::post('/reservas/{reserva}/consumir', [ReservaController::class, 'storeConsumo'])->name('reservas.storeConsumo');

        //consumir remessas
        Route::get('/reservas/consumir', [ReservaController::class, 'consumir'])->name('reservas.consumir');
        Route::post('/reservas/consumir/{reserva}', [ReservaController::class, 'storeConsumo'])->name('reservas.consumir.store');
    });

    Route::prefix('depositos')->group(function () {
        // Listar depósitos
        Route::get('/', [DepositoController::class, 'index'])->name('depositos.index');

        // Formulário para criar depósito
        Route::get('/create', [DepositoController::class, 'create'])->name('depositos.create');

        // Salvar novo depósito
        Route::post('/', [DepositoController::class, 'store'])->name('depositos.store');

        // Excluir depósito
        Route::delete('/{id}', [DepositoController::class, 'destroy'])->name('depositos.destroy');
    });


// Exibir formulário de transferência de material
Route::get('/materiais/{material}/transferir', [ControleDeEstoqueController::class, 'transferForm'])->name('materiais.transferir.form');

// Realizar a transferência de depósito
Route::post('/materiais/transferir', [ControleDeEstoqueController::class, 'transfer'])->name('materiais.transferir');

Route::get('/reservas/pdf', [ReservaController::class, 'gerarPDF'])->name('reservas.pdf');
Route::get('/reservas/relatorio-consumos', [ReservaController::class, 'relatorioConsumos'])->name('reservas.relatorioConsumos');
require __DIR__.'/auth.php';
