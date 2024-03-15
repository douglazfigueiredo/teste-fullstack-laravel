@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card mt-5 align-items-md-center">
            <div class="card-body d-flex flex-column">
                <h1>Lista de Representantes</h1>

                <div class="card mt-5">
                    <div class="card-body d-flex flex-column">
                        <form action="{{ route('representantes.index') }}" method="GET">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label for="nome" class="form-label">Filtrar por Nome:</label>
                                    <input type="text" class="form-control" name="nome" id="nome"
                                        value="{{ request('nome') }}">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="email" class="form-label">Filtrar por E-mail:</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ request('email') }}">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-md-2">
                                    <button type="submit" class="btn btn-primary">Filtrar</button>
                                </div>
                                <div class="col-12 col-md-3">
                                    <a href="{{ route('representantes.index') }}" class="btn btn-secondary">Limpar
                                        Filtro</a>
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
                                <th>CEP</th>
                                <th>Cidade</th>
                                <th>UF</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($representantes as $representante)
                                <tr>
                                    <td>{{ $representante->id }}</td>
                                    <td>{{ $representante->nome }}</td>
                                    <td>{{ $representante->email }}</td>
                                    <td>{{ $representante->cep }}</td>
                                    <td>{{ $representante->cidade }}</td>
                                    <td>{{ $representante->uf }}</td>
                                    <td>
                                        <form action="{{ route('representantes.destroy', $representante->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
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
