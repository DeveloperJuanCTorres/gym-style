@extends('layouts.app')

@section('content')

<div class="container-xxl py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-5">

                        <div
                            class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center"
                            style="width:90px;height:90px;">

                            <i class="fas fa-check fa-3x"></i>

                        </div>

                        <h1 class="mt-4 fw-bold">
                            ¡Gracias por tu compra!
                        </h1>

                        <p class="text-muted fs-5">

                            Hemos recibido correctamente tu pedido.

                        </p>

                    </div>

                    <div class="row mb-5">

                        <div class="col-md-6">

                            <h5 class="fw-bold mb-3">
                                Información del pedido
                            </h5>

                            <p class="mb-1">
                                <strong>Número:</strong>
                                {{ $order->order_number }}
                            </p>

                            <p class="mb-1">
                                <strong>Estado:</strong>

                                <span class="badge bg-warning text-dark">
                                    {{ ucfirst($order->status) }}
                                </span>

                            </p>

                            <p class="mb-1">
                                <strong>Fecha:</strong>
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </p>

                        </div>

                        <div class="col-md-6">

                            <h5 class="fw-bold mb-3">
                                Cliente
                            </h5>

                            <p class="mb-1">
                                {{ $order->first_name }}
                                {{ $order->last_name }}
                            </p>

                            <p class="mb-1">
                                {{ $order->email }}
                            </p>

                            <p class="mb-0">
                                {{ $order->phone }}
                            </p>

                        </div>

                    </div>

                    <h4 class="fw-bold mb-4">
                        Productos
                    </h4>

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>

                            <tr>

                                <th>Producto</th>
                                <th>Color</th>
                                <th>Talla</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-end">Precio</th>
                                <th class="text-end">Subtotal</th>

                            </tr>

                            </thead>

                            <tbody>

                            @foreach($order->items as $item)

                                <tr>

                                    <td>

                                        <strong>
                                            {{ $item->product_name }}
                                        </strong>

                                    </td>

                                    <td>

                                        {{ $item->color }}

                                    </td>

                                    <td>

                                        {{ $item->size }}

                                    </td>

                                    <td class="text-center">

                                        {{ $item->quantity }}

                                    </td>

                                    <td class="text-end">

                                        S/ {{ number_format($item->price,2) }}

                                    </td>

                                    <td class="text-end fw-bold">

                                        S/ {{ number_format($item->subtotal,2) }}

                                    </td>

                                </tr>

                            @endforeach

                            </tbody>

                            <tfoot>

                            <tr>

                                <th colspan="5" class="text-end">

                                    Total

                                </th>

                                <th class="text-end fs-5">

                                    S/ {{ number_format($order->total,2) }}

                                </th>

                            </tr>

                            </tfoot>

                        </table>

                    </div>

                    <hr class="my-5">

                    <div class="row text-center g-4">

                        <div class="col-md-4">

                            <i class="fas fa-envelope fa-2x text-primary mb-3"></i>

                            <h6 class="fw-bold">

                                Confirmación

                            </h6>

                            <small class="text-muted">

                                Te enviaremos un correo con el resumen del pedido.

                            </small>

                        </div>

                        <div class="col-md-4">

                            <i class="fas fa-truck fa-2x text-primary mb-3"></i>

                            <h6 class="fw-bold">

                                Seguimiento

                            </h6>

                            <small class="text-muted">

                                Nuestro equipo procesará tu pedido lo antes posible.

                            </small>

                        </div>

                        <div class="col-md-4">

                            <i class="fas fa-headset fa-2x text-primary mb-3"></i>

                            <h6 class="fw-bold">

                                Soporte

                            </h6>

                            <small class="text-muted">

                                Si tienes dudas, estaremos encantados de ayudarte.

                            </small>

                        </div>

                    </div>

                    <div class="text-center mt-5">

                        <a href="{{ route('home') }}"
                           class="btn btn-primary btn-lg px-5">

                            Seguir comprando

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection