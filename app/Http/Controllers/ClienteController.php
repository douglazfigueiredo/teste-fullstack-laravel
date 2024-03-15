<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Representante;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Cliente::query();

        if ($request->filled('representante_id')) {
            $query->where('representante_id', $request->input('representante_id'));
        }

        $clientes = $query->get();
        $representantes = Representante::all();

        return view('clientes.index', compact('clientes', 'representantes'));
    }

    public function clientesPorRepresentante(Representante $representante)
    {
        $clientes = $representante->clientes;
        return view('clientes.clientes_por_representante', compact('clientes', 'representante'));
    }

    public function create()
    {
        $representantes = Representante::all();
        return view('clientes.create', compact('representantes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'cnpj_cpf' => [
                'required',
                'unique:clientes',
                function ($attribute, $value, $fail) use ($request) {
                    if (strlen($request->cnpj_cpf) == 11 && is_numeric($request->cnpj_cpf)) {
                        if (Carbon::parse($request->data_fundacao)->diffInYears(now()) < 18) {
                            $fail('Só é possível cadastrar maiores de idade.');
                        }
                    }
                },
            ],
            'telefone' => 'required',
            'data_fundacao' => 'required|date',
            'representante_id' => 'required|exists:representantes,id',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.create')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'cnpj_cpf' => [
                'required',
                'unique:clientes',
                function ($attribute, $value, $fail) use ($request) {
                    if (strlen($request->cnpj_cpf) == 11 && is_numeric($request->cnpj_cpf)) {
                        if (Carbon::parse($request->data_fundacao)->diffInYears(now()) < 18) {
                            $fail('Para atualizar os dados, o cliente maiores de idade.');
                        }
                    }
                },
            ],
            'telefone' => 'required',
            'data_fundacao' => 'required|date',
        ]);

        $cliente->update($request->all());

        return Redirect::route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return Redirect::route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
