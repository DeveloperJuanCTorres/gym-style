@extends('layouts.app')

@section('content')

<section class="py-5 mt-5">

    <div class="container">

        <div class="row">

            <!-- Productos -->

            <div class="col-lg-8">

                <h2 class="fw-bold mb-4">

                    Mi carrito

                </h2>

                <div id="cartPageItems">

                </div>

            </div>

            <!-- Resumen -->

            <div class="col-lg-4">

                <div class="card shadow border-0 sticky-top" style="top:100px">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Resumen

                        </h4>

                        <div class="d-flex justify-content-between">

                            <span>Subtotal</span>

                            <strong id="pageSubtotal">

                                S/.0.00

                            </strong>

                        </div>

                        <div class="d-flex justify-content-between mt-2">

                            <span>Envío</span>

                            <strong>

                                Gratis

                            </strong>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">

                            <h5>Total</h5>

                            <h5 id="pageTotal">

                                S/.0.00

                            </h5>

                        </div>                          
                        
                        <a
                            href="{{ route('checkout.index') }}"
                            class="btn btn-warning w-100 mt-4">

                            Finalizar compra

                        </a>

                        <a
                            href="{{ route('shop.hombre') }}"
                            class="btn btn-outline-dark w-100 mt-2">

                            Seguir comprando

                        </a>

                        <button
                            class="btn btn-outline-danger w-100 mt-2"
                            onclick="clearCart()">

                            Vaciar carrito

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<script>
    function clearCart()
    {
        Swal.fire({

            title: '¿Vaciar carrito?',

            text: 'Se eliminarán todos los productos.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'Sí',

            cancelButtonText: 'Cancelar'

        }).then((result)=>{

            if(!result.isConfirmed) return;

            fetch('/cart/clear',{

                method:'DELETE',

                headers:{

                    'X-CSRF-TOKEN':
                    document.querySelector('meta[name="csrf-token"]').content

                }

            })
            .then(r=>r.json())
            .then(data=>{

                loadCart();

                Toast.fire({

                    icon:'success',

                    title:'Carrito vaciado'

                });

            });

        });
    }
</script>

@endsection