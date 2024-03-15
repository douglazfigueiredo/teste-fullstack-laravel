<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'uf',
    ];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
