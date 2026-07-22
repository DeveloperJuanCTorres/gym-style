@extends('layouts.app')

@section('content')

<section class="checkout-section py-5 mt-5">

    <div class="container">

        <form id="checkoutForm">

        @csrf
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
                                        id="first_name"
                                        name="first_name">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Apellidos

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="last_name"
                                        name="last_name">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Correo electrónico

                                    </label>

                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">

                                        Celular

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="phone"
                                        name="phone">

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
                                    name="shipping_method"
                                    value="pickup">

                                <label class="form-check-label">

                                    Recojo en tienda

                                </label>

                            </div>

                            <div class="form-check mt-2">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="shipping_method"
                                    value="delivery">

                                <label class="form-check-label">

                                    Delivery

                                </label>

                            </div>

                        </div>

                    </div>

                    <!-- Dirección -->
                    <div class="card border-0 shadow-sm mb-4 d-none" id="shippingAddressCard">

                        <div class="card-body p-4">

                            <h5 class="fw-bold mb-4">

                                Dirección de envío

                            </h5>

                            <div class="row">

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">

                                        Departamento

                                    </label>

                                    <select id="department" class="form-control departamento" name="department">    
                                        <option data-id="" value="">-Seleccionar-</option>
                                    </select>

                                </div>

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">

                                        Provincia

                                    </label>

                                    <select id="province" class="form-control provincia" name="province">
                                        <option data-id="" value="Chachapoyas">-Seleccionar-</option>                
                                    </select>

                                </div>

                                <div class="col-md-4 mb-3">

                                    <label class="form-label">

                                        Distrito

                                    </label>

                                    <select id="district" class="form-control distrito" name="district">
                                        <option data-id="" value="">-Seleccionar-</option>
                                    </select>

                                </div>

                                <div class="col-12 mb-3">

                                    <label class="form-label">

                                        Dirección

                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="address"
                                        name="address">

                                </div>

                                <div class="col-12">

                                    <label class="form-label">

                                        Referencia

                                    </label>

                                    <textarea
                                        class="form-control"
                                        rows="3"
                                        id="reference"
                                        name="reference"></textarea>

                                </div>

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
                                type="submit"
                                id="btnFinishOrder"
                                class="btn btn-warning w-100 mt-4">

                                Finalizar compra

                            </button>

                        </div>

                    </div>

                </div>               

            </div>
        </form>
    </div>

</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function(){

        loadCart();

    });


    $('input[name="shipping_method"]').change(function () {

        if ($(this).val() == 'delivery') {

            $('#shippingAddressCard').removeClass('d-none');

        } else {

            $('#shippingAddressCard').addClass('d-none');
            $('#address').val('');
            $('#reference').val('');
            $('#department').val('');
            $('#province').val('');
            $('#district').val('');

        }

    });


    $("#checkoutForm").submit(function (e) {

        e.preventDefault();

        $.ajax({

            url: "{{ route('checkout.store') }}",
            type: "POST",
            data: $(this).serialize(),

            success: function (res) {

                Toast.fire({
                    icon: "success",
                    title: res.message
                });

                setTimeout(function () {

                    window.location.href = "/gracias";

                }, 1200);

            },

            error: function (xhr) {

                Toast.fire({
                    icon: "error",
                    title: xhr.responseJSON.message
                });

            }

        });

    });

</script>

@endsection