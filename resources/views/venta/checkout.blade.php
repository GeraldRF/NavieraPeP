@extends('layouts.vendor-comun')

@section('title', 'Checkout | Naviera PeP')

@section('styles')
    <link href="{{ URL::asset('css/home_index.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container" style="min-height: 76%; margin-top: 30px; margin-bottom:30px; display: flex; justify-content: center;align-items: flex-start;">

        <div style="background-color: white; display: flex; flex-direction: column; padding: 30px; gap:50px; width: max-content;">
            <h2 style="text-align: center;">Su cuenta</h2>

            <div style="display: flex; flex-direction: column; flex-wrap:wrap; justify-content: space-evenly; ">
                <div style="display: flex; flex-direction: row; border-bottom:0.5px solid; margin-bottom:10px">
                    <div>
                        <ul style="list-style: none">
                            <li>
                                <h4><strong>Origen</strong></h4>
                            </li>
                            <li>
                                <h4><strong>Destino:</strong></h4>
                            </li>
                            <li>
                                <h4><strong>Tipo:</strong></h4>
                            </li>
                            <li>
                                <h4><strong>Cantidad:</strong></h4>
                            </li>
                            @if ($bill['tipo'] == 1)
                                <li>
                                    <h4><strong>Descripcion:</strong></h4>
                                </li>
                            @endif
                            <li>
                                <h4><strong>Fecha de compra:</strong></h4>
                            </li>
                            <li>
                                <h4><strong>Total:</strong></h4>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <ul style="list-style: none">
                            <li>
                                <h4>{{ $ruta->origen }}</h4>
                            </li>
                            <li>
                                <h4>{{ $ruta->destino }}</h4>
                            </li>
                            @if ($bill['tipo'] == 1)
                                <li>
                                    <h4>Carga</h4>
                                </li>
                                <li>
                                    <h4>{{ $bill['cantidad'] }} kg</h4>
                                </li>
                                <li>
                                    <h4>{{ $bill['descripcion'] }}</h4>
                                </li>
                            @else
                                <li>
                                    <h4>Pasaje</h4>
                                </li>
                                <li>
                                    <h4>{{ $bill['cantidad'] }}</h4>
                                </li>
                            @endif

                            <li>
                                <h4>{{ $bill['fecha_venta'] }}</h4>
                            </li>
                            <li>
                                <h4>{{ $bill['total'] }}</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <div style="align-self: self-end;">
                    {!! Form::open(['route' => 'ventas.store', 'method' => 'post']) !!}
                    {!! Form::hidden('itinerario_id', $bill['itinerario_id']) !!}
                    {!! Form::hidden('tipo', $bill['tipo']) !!}
                    {!! Form::hidden('cantidad', $bill['cantidad']) !!}
                    {!! Form::hidden('total', $bill['total']) !!}
                    {!! Form::hidden('fecha_venta', $bill['fecha_venta']) !!}
                    {!! Form::hidden('user_id', $bill['user_id']) !!}
                    {!! Form::hidden('descripcion', $bill['descripcion']) !!}
                    {!! Form::submit('Confirmar compra', ['class' => 'btn btn-success']) !!}
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>

@endsection
