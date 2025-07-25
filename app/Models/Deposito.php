<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposito extends Model
{
    use HasFactory;

    protected $fillable = [
        'rua',
        'gondola',
        'codigo', // adicione também se estiver sendo usado no seeder
    ];
}
