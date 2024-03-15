@extends('layouts.app')
@section('content')
<div class="col-12">
    <div class="card mt-5 align-items-md-center">
        <div class="card-body d-flex flex-column">

        <p class="fs-2">Editar Cliente</p>

        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
            <label for="nome"  class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" value="{{ $cliente->nome }}" required>
            </div>

            <label for="email"  class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $cliente->email }}" required>
            <br>

            <label for="cnpj_cpf"  class="form-label">CNPJ ou CPF:</label>
            <input type="text" class="form-control" name="cnpj_cpf" id="cnpj_cpf" value="{{ $cliente->cnpj_cpf }}" required>
            <br>

            <label for="telefone"  class="form-label">Telefone(s):</label>
            <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $cliente->telefone }}" required>
            <br>

            <label for="data_fundacao"  class="form-label">Data de Fundação ou Nascimento:</label>
            <input type="date" class="form-control" name="data_fundacao" id="data_fundacao" value="{{ $cliente->data_fundacao }}" required>
            <br>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>

    </div>
    </div>
    </div>
    @endsection
