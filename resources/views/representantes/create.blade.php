@extends('layouts.app')
@section('content')
        <div class="col-12">
            <div class="card mt-5 align-items-md-center">
                <div class="card-body d-flex flex-column">
                    <p class="fs-2">Cadastro de Representante</p>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('representantes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" required>
                        </div>

                        <div class="mb-3">
                            <label for="email"class="form-label">E-mail:</label>
                            <input type="email"class="form-control" name="email" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="cep"class="form-label">CEP:</label>
                            <input type="text" class="form-control" name="cep" id="cep" required pattern="\d{5}-\d{3}">
                        </div>

                        <div class="mb-3">
                            <label for="logradouro">Logradouro:</label>
                            <input type="text" class="form-control" name="logradouro" id="logradouro" required>
                        </div>

                        <div class="mb-3">
                            <label for="numero">Número:</label>
                            <input type="text" class="form-control" name="numero" id="numero" required>
                        </div>

                        <div class="mb-3">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" name="bairro" id="bairro" required>
                        </div>

                        <div class="mb-3">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" required>
                        </div>

                        <div class="mb-3">
                            <label for="uf">UF:</label>
                            <input type="text" class="form-control" name="uf" id="uf" required pattern="[A-Za-z]{2}">
                        </div>

                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/addressFormater.js') }}"></script>
    @endsection
