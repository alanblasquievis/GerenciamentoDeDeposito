<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deposito;

class DepositosSeeder extends Seeder
{
    public function run(): void
    {
        for ($rua = 1; $rua <= 10; $rua++) {
            for ($gondola = 1; $gondola <= 20; $gondola++) {
                Deposito::create([
                    'rua' => str_pad($rua, 2, '0', STR_PAD_LEFT),
                    'gondola' => str_pad($gondola, 2, '0', STR_PAD_LEFT),
                    'codigo' => 'r' . str_pad($rua, 2, '0', STR_PAD_LEFT) . 'g' . str_pad($gondola, 2, '0', STR_PAD_LEFT),
                ]);
            }
        }
    }

}
