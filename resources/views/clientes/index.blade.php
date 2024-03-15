@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card mt-5 align-items-md-center">
            <div class="card-body d-flex flex-column">
                <h1>Lista de Clientes</h1>

                <div class="card mt-5">
                    <div class="card-body d-flex flex-column">
                        <form action="{{ route('clientes.index') }}" method="GET">
                                <div class="col-12">
                                    <label for="representante_id" class="form-label">Filtrar por Representante:</label>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <select name="representante_id" class="form-control mb-3" id="representante_id">
                                            <option value="">Todos</option>
                                            @foreach ($representantes as $representante)
                                                <option value="{{ $representante->id }}"
                                                    {{ request('representante_id') == $representante->id ? 'selected' : '' }}>
                                                    {{ $representante->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <button type="submit" class="btn btn-primary">Filtrar</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>CNPJ/CPF</th>
                                <th>Telefone</th>
                                <th>Data de Fundação/Nascimento</th>
                                <th>Representante</th>
                                <th>Deletar</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->cnpj_cpf }}</td>
                                    <td>{{ $cliente->telefone }}</td>
                                    <td>{{ $cliente->data_fundacao }}</td>
                                    <td>
                                        @if ($cliente->representante)
                                            {{ $cliente->representante->nome }}
                                        @else
                                            Representante não associado
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}"
                                            class="btn btn-primary">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
