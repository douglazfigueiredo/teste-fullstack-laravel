@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="col-md-12 mx-auto text-center">
            <div class="card">
                <div class="card-body d-flex flex-column">
                    <a href="/representantes/create" class="btn btn-primary mb-2">Cadastrar Representantes</a>
                    <a href="/clientes/create" class="btn btn-primary">Cadastrar Clientes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
