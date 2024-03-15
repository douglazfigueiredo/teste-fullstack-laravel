@extends('layouts.app')
@section('content')
    <div class="col-12">
        <div class="card mt-5 align-items-md-center">
            <div class="card-body d-flex flex-column">
                <p class="fs-2">Cadastro de Cliente</p>
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
                <form action="{{ route('clientes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" required>
                    </div>

                    <div class="mb-3">
                        <label for="email"class="form-label">E-mail:</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="cnpj_cpf" class="form-label">CNPJ ou CPF:</label>
                        <input type="text" class="form-control" name="cnpj_cpf" id="cnpj_cpf" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone(s):</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" required>
                    </div>

                    <div class="mb-3">
                        <label for="data_fundacao" class="form-label">Data de Fundação ou Nascimento:</label>
                        <input type="date" class="form-control" name="data_fundacao" id="data_fundacao" required>
                    </div>

                    <div class="mb-3">
                        <label for="representante_id" class="form-label">Representante:</label>
                        <select name="representante_id" id="representante_id" class="form-control" required>
                            @foreach ($representantes as $representante)
                                <option value="{{ $representante->id }}">{{ $representante->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
