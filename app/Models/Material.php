<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ControleDeEstoque;

class Material extends Model
{
    // Em Material.php (model)
        public function estoque() {
    return $this->belongsTo(ControleDeEstoque::class);
}

}
