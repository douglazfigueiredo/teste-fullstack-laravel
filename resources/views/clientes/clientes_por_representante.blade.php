@extends('layouts.app')

@section('content')
    <h1>Clientes do Representante: {{ $representante->nome }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
