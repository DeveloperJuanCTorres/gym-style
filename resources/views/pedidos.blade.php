@extends('layouts.app')

@section('content')

<!-- =========================================
HERO
========================================= -->

<section class="py-5 mt-5 bg-dark text-white">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                    SERVICIO ESPECIAL
                </span>

                <h1 class="display-5 fw-bold">

                    ¿No encuentras el producto que buscas?

                </h1>

                <p class="text-light mt-4 fs-5">

                    Nosotros lo conseguimos por ti.
                    Envíanos una fotografía o descríbenos el producto que
                    necesitas y nuestro equipo buscará la mejor opción para
                    ofrecerte una cotización.

                </p>

            </div>

            <div class="col-lg-6 text-center">

                <img
                    src="{{ asset('images/request-product.png') }}"
                    class="img-fluid"
                    style="max-height:420px;">

            </div>

        </div>

    </div>

</section>


<!-- =========================================
FORMULARIO
========================================= -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="card border-0 shadow-lg rounded-4">

                    <div class="card-body p-5">

                        <form id="requestProductForm"
                            method="POST"
                            action="{{ route('product-request.store') }}"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="row">

                                <!-- DATOS -->

                                <div class="col-12">

                                    <h4 class="fw-bold mb-4">

                                        Información del cliente

                                    </h4>

                                </div>

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Nombres

                                    </label>

                                    <input
                                        type="text"
                                        name="first_name"
                                        class="form-control form-control-lg">

                                </div>

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Apellidos

                                    </label>

                                    <input
                                        type="text"
                                        name="last_name"
                                        class="form-control form-control-lg">

                                </div>

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Correo electrónico

                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control form-control-lg">

                                </div>

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Celular

                                    </label>

                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control form-control-lg">

                                </div>

                            </div>

                            <hr class="my-5">

                            <div class="row">

                                <div class="col-12">

                                    <h4 class="fw-bold mb-4">

                                        Producto solicitado

                                    </h4>

                                </div>

                                <div class="col-md-6 mb-4">

                                    <label class="form-label">

                                        Nombre del producto

                                    </label>

                                    <input
                                        type="text"
                                        name="product_name"
                                        class="form-control form-control-lg">

                                </div>

                                <div class="col-md-3 mb-4">

                                    <label class="form-label">

                                        Marca

                                    </label>

                                    <input
                                        type="text"
                                        name="brand"
                                        class="form-control form-control-lg">

                                </div>

                                <div class="col-md-3 mb-4">

                                    <label class="form-label">

                                        Cantidad

                                    </label>

                                    <input
                                        type="number"
                                        min="1"
                                        value="1"
                                        name="quantity"
                                        class="form-control form-control-lg">

                                </div>

                            </div>


                            <!-- SUBIR IMAGEN -->

                            <div class="mb-5">

                                <label class="form-label fw-bold">

                                    Imagen del producto

                                </label>

                                <div
                                    class="upload-area rounded-4 p-5 text-center">

                                    <input
                                        type="file"
                                        id="image"
                                        name="image"
                                        hidden>

                                    <label
                                        for="image"
                                        style="cursor:pointer;">

                                        <i class="fa-solid fa-cloud-arrow-up fa-4x text-warning mb-3"></i>

                                        <h5>

                                            Haz clic para subir una imagen

                                        </h5>

                                        <p class="text-muted">

                                            JPG, PNG o WEBP

                                        </p>

                                    </label>

                                    <div
                                        id="previewContainer"
                                        class="mt-4 d-none">

                                        <img
                                            id="preview"
                                            class="img-fluid rounded-4 shadow"
                                            style="max-height:350px;">

                                    </div>

                                </div>

                            </div>


                            <div class="mb-5">

                                <label class="form-label fw-bold">

                                    Descripción

                                </label>

                                <textarea
                                    rows="6"
                                    name="description"
                                    class="form-control"
                                    placeholder="Cuéntanos el modelo, color, talla, características o cualquier detalle que nos ayude a encontrar el producto..."></textarea>

                            </div>


                            <button
                                class="btn btn-warning btn-lg w-100 py-3" type="submit">

                                <i class="fa-solid fa-paper-plane me-2"></i>

                                ENVIAR SOLICITUD

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

document.getElementById('image').addEventListener('change',function(e){

    let file=e.target.files[0];

    if(file){

        document.getElementById('preview').src=
            URL.createObjectURL(file);

        document.getElementById('previewContainer')
            .classList.remove('d-none');

    }

});

</script>

<script>
    $("#requestProductForm").submit(function(e){

        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({

            url: $(this).attr('action'),
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,

            success:function(res){

                Toast.fire({
                    icon:'success',
                    title:res.message
                });

                $("#requestProductForm")[0].reset();

                $("#previewContainer").addClass("d-none");

            },

            error:function(xhr){

                let mensaje="Ocurrió un error.";

                if(xhr.status==422){

                    mensaje=Object.values(xhr.responseJSON.errors)[0][0];

                }else{

                    mensaje=xhr.responseJSON.message;

                }

                Toast.fire({
                    icon:'error',
                    title:mensaje
                });

            }

        });

    });
</script>

@endsection