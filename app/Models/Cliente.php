<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'email', 'cnpj_cpf', 'telefone', 'data_fundacao', 'representante_id',
    ];

    public function representante()
    {
        return $this->belongsTo(Representante::class);
    }
}
