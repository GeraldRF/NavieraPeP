@extends('layouts.vendor-comun')

@section('title', 'Mis compras | Naviera PeP')

@section('styles')
    <link href="{{ URL::asset('css/home_index.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        <div class="card">
            <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Tipo</th>
                            <th>Fecha salida</th>
                            <th>Fecha compra</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Descripcion</th>
                            <th colspan="1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras as $compra)
                            <tr>
                                <td>{{ $compra['origen'] }}</td>
                                <td>{{ $compra['destino'] }}</td>
                                <td>
                                    @if ($compra['tipo'] == 0)
                                        Pasaje
                                    @else
                                        Carga
                                    @endif

                                </td>
                                <td>{{ $compra['fecha_salida'] }}
                                <td>{{ $compra['fecha_compra'] }}</td>
                                <td>{{ $compra['cantidad'] }}</td>
                                <td>{{ $compra['total'] }}</td>
                                <td>{{ $compra['descripcion'] }}</td>
                                <td width="10px">


                                    <form action="{{ route('imprimir-v', $compra) }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <button class="btn btn-primary btn-sm" type="submit">Imprimir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
