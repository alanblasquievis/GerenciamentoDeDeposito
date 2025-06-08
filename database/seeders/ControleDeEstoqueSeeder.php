<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ControleDeEstoque;
use App\Models\Deposito;
use App\Models\Estabelecimento;

class ControleDeEstoqueSeeder extends Seeder
{
    public function run(): void
    {
        $depositos = Deposito::all();
        $estabelecimentos = Estabelecimento::all();

        if ($depositos->isEmpty() || $estabelecimentos->isEmpty()) {
            $this->command->warn('Crie depósitos e estabelecimentos primeiro.');
            return;
        }

        $materiais = [
            'Caneta azul',
            'Caderno universitário',
            'Marcador de texto',
            'Grampeador',
            'Furador de papel',
            'Régua de 30cm',
            'Apontador metálico',
            'Borracha branca',
            'Calculadora científica',
            'Envelope pardo A4',
            'Caixa organizadora',
            'Pasta sanfonada',
            'Cartucho de tinta',
            'Toner preto',
            'Folha sulfite A4',
            'Clips de papel',
            'Fita adesiva',
            'Tesoura escolar',
            'Bloco de notas',
            'Pincel atômico',
        ];

        foreach ($materiais as $nome) {
            ControleDeEstoque::create([
                'material' => $nome,
                'descricao' => 'Descrição do material: ' . $nome,
                'estabelecimento_id' => $estabelecimentos->random()->id,
                'tipo' => ['Consumo', 'Permanente'][rand(0, 1)],
                'em_estoque' => rand(5, 200),
                'deposito_id' => $depositos->random()->id,
            ]);
        }
    }
}
