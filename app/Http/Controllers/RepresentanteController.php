<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Representante;
use Illuminate\Support\Facades\Log;

class RepresentanteController extends Controller
{

    public function index(Request $request)
    {
        $query = Representante::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        $representantes = $query->get();

        return view('representantes.index', compact('representantes'));
    }

    public function create()
    {
        return view('representantes.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:representantes',
            'cep' => 'required|regex:/^\d{5}-\d{3}$/',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required|size:2',
        ]);

        Representante::create($request->all());

        return redirect()->route('representantes.create')->with('success', 'Representante cadastrado com sucesso!');
    }

    public function edit(Representante $representante)
    {
        return view('representantes.edit', compact('representante'));
    }

    public function update(Request $request, Representante $representante)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:representantes,email,' . $representante->id,
            'cep' => 'required|regex:/^\d{5}-\d{3}$/',
            'logradouro' => 'required',
            'numero' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'uf' => 'required|size:2',
        ]);

        $representante->update($request->all());

        return redirect()->route('representantes.index')->with('success', 'Representante atualizado com sucesso!');
    }

    public function destroy(Representante $representante)
    {


        $representante->clientes()->where('representante_id', $representante->id)->update(['representante_id' => null]);

        $representante->delete();

        return redirect()->route('representantes.index')->with('success', 'Representante excluído com sucesso!');
    }

    public function clientes(Representante $representante)
    {
        $clientes = $representante->clientes;
        return view('clientes.clientes_por_representante', compact('clientes', 'representante'));
    }
}
