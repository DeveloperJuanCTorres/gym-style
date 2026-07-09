@extends('layouts.app')

@section('content')

<section class="checkout-section py-5 mt-5">

    <div class="container">

        <div class="row g-5">

            <!-- =======================================
            INFORMACIÓN DEL CLIENTE
            ======================================== -->

            <div class="col-lg-7">

                <h2 class="fw-bold mb-4">

                    Finalizar compra

                </h2>

                <!-- Información -->

                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">

                            Información de contacto

                        </h5>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Nombres

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="first_name">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Apellidos

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="last_name">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Correo electrónico

                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">

                                    Celular

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone">

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Dirección -->

                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-4">

                            Dirección de envío

                        </h5>

                        <div class="row">

                            <div class="col-md-4 mb-3">

                                <label class="form-label">

                                    Departamento

                                </label>

                                <select
                                    class="form-select"
                                    id="department">

                                    <option>

                                        Seleccione

                                    </option>

                                </select>

                            </div>

                            <div class="col-md-4 mb-3">

                                <label class="form-label">

                                    Provincia

                                </label>

                                <select
                                    class="form-select"
                                    id="province">

                                    <option>

                                        Seleccione

                                    </option>

                                </select>

                            </div>

                            <div class="col-md-4 mb-3">

                                <label class="form-label">

                                    Distrito

                                </label>

                                <select
                                    class="form-select"
                                    id="district">

                                    <option>

                                        Seleccione

                                    </option>

                                </select>

                            </div>

                            <div class="col-12 mb-3">

                                <label class="form-label">

                                    Dirección

                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="address">

                            </div>

                            <div class="col-12">

                                <label class="form-label">

                                    Referencia

                                </label>

                                <textarea
                                    class="form-control"
                                    rows="3"
                                    id="reference"></textarea>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Método de entrega -->

                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">

                            Método de entrega

                        </h5>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="shipping"
                                value="pickup">

                            <label class="form-check-label">

                                Recojo en tienda

                            </label>

                        </div>

                        <div class="form-check mt-2">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="shipping"
                                value="delivery">

                            <label class="form-check-label">

                                Delivery

                            </label>

                        </div>

                    </div>

                </div>

                <!-- Método de pago -->

                <div class="card border-0 shadow-sm">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">

                            Método de pago

                        </h5>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="payment"
                                value="yape">

                            <label class="form-check-label">

                                Yape

                            </label>

                        </div>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="payment"
                                value="plin">

                            <label class="form-check-label">

                                Plin

                            </label>

                        </div>

                        <div class="form-check">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="payment"
                                value="culqi">

                            <label class="form-check-label">

                                Tarjeta (Culqi)

                            </label>

                        </div>

                    </div>

                </div>

            </div>

            <!-- =======================================
            RESUMEN
            ======================================== -->

            <div class="col-lg-5">

                <div
                    class="card shadow border-0 sticky-top"
                    style="top:100px;">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Resumen del pedido

                        </h4>

                        <div id="checkoutItems">

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <span>

                                Subtotal

                            </span>

                            <strong id="checkoutSubtotal">

                                S/.0.00

                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mt-2">

                            <span>

                                Envío

                            </span>

                            <strong id="checkoutShipping">

                                Gratis

                            </strong>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <h5>Total</h5>

                            <h5 id="checkoutTotal">

                                S/.0.00

                            </h5>

                        </div>

                        <button
                            class="btn btn-warning w-100 mt-4"
                            id="btnFinishOrder">

                            Finalizar compra

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<script>

    document.addEventListener('DOMContentLoaded', function(){

        loadCart();

    });

</script>

@endsection