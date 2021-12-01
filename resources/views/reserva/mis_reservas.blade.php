@extends('layouts.vendor-comun')

@section('title', 'Mis reservas | Naviera PeP')

@section('styles')
    <link href="{{ URL::asset('css/home_index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container" style="min-height: 80%">
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
                        <th>Fecha limite pago</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Descripcion</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva['origen'] }}</td>
                            <td>{{ $reserva['destino'] }}</td>
                            <td>
                                @if ($reserva['tipo'] == 0)
                                    Pasaje
                                @else
                                    Carga
                                @endif

                            </td>
                            <td>{{ $reserva['fecha_salida'] }}
                            <td>{{ $reserva['fecha_reserva'] }}</td>
                            <td>{{date('Y-m-d H:i:s', strtotime($reserva['fecha_salida']."- 2 days"))}}</td>
                            <td>{{ $reserva['cantidad'] }}</td>
                            <td>{{ $reserva['total'] }}</td>
                            <td>{{ $reserva['descripcion'] }}</td>
                            <td width="10px">
                                <form action="{{ route('renunciar', $reserva) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Renunciar</button>
                                </form>
                            </td>
                            <td width="10px">
                                <form action="{{ route('pagar', $reserva) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success btn-sm" type="submit">Pagar</button>
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