@extends('layouts.app')
<link href="{{asset('css/hombre.css')}}" rel="stylesheet">
@section('content')

<!-- =========================================
HERO HOMBRE
========================================= -->

<section class="hero-section">

    <img
        class="hero-img"
        src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?w=1800"
        alt="Men Collection">

    <div class="hero-overlay"></div>

    <div class="hero-content container">

        <span class="label-caps text-kinetic-yellow mb-3 d-block"
              style="letter-spacing:.4em;">

            MEN COLLECTION

        </span>

        <h1 class="display-kinetic text-white">

            POWER YOUR
            <br>
            PERFORMANCE

        </h1>

        <p class="text-secondary fs-5 mt-4">

            Ropa diseñada para superar cada entrenamiento.

        </p>

        <button class="btn btn-kinetic-primary mt-4">

            EXPLORAR AHORA

        </button>

    </div>

</section>


<!-- =========================================
CATEGORIAS
========================================= -->

<section class="py-5 bg-black">

    <div class="container">

        <div class="d-flex flex-wrap justify-content-center gap-3">

            <button class="btn btn-kinetic-outline">
                TODOS
            </button>

            <button class="btn btn-kinetic-outline">
                POLOS
            </button>

            <button class="btn btn-kinetic-outline">
                SHORTS
            </button>

            <button class="btn btn-kinetic-outline">
                JOGGERS
            </button>

            <button class="btn btn-kinetic-outline">
                CASACAS
            </button>

            <button class="btn btn-kinetic-outline">
                ACCESORIOS
            </button>

        </div>

    </div>

</section>


<!-- =========================================
PRODUCTOS
========================================= -->

<section class="product-section">

    <div class="container-fluid px-md-5">

        <div class="d-flex justify-content-between align-items-end mb-5">

            <div>

                <span class="label-caps text-kinetic-yellow mb-2 d-block">

                    MEN COLLECTION

                </span>

                <h2 class="text-white h1 mb-0">

                    COLECCIÓN HOMBRE

                </h2>

            </div>

            <a href="#"
               class="text-secondary text-decoration-none">

                VER TODO →

            </a>

        </div>

        <div class="row g-4">

            @for($i=1;$i<=12;$i++)

            <div class="col-sm-6 col-lg-3">

                <div class="product-card">

                    <div class="product-img-wrapper">

                        <img
                            src="https://picsum.photos/500/700?random={{$i}}"
                            alt="">

                        <div class="position-absolute top-0 start-0 p-3">

                            <span class="badge badge-new rounded-0">

                                NEW

                            </span>

                        </div>

                        <button class="btn btn-add-cart">

                            AÑADIR AL CARRITO

                        </button>

                    </div>

                    <div class="d-flex justify-content-between">

                        <div>

                            <h3 class="text-white fs-6 text-uppercase mb-1">

                                Performance Tee

                            </h3>

                            <span class="label-caps text-kinetic-yellow">

                                S / M / L

                            </span>

                        </div>

                        <div class="text-end">

                            <span class="text-white fw-bold fs-5">

                                S/.89

                            </span>

                        </div>

                    </div>

                </div>

            </div>

            @endfor

        </div>

    </div>

</section>


<!-- =========================================
PROMO
========================================= -->

<section class="promo-section">

    <div class="container-fluid px-md-5">

        <div class="promo-card">

            <img
                src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=1600"
                alt="">

            <div class="promo-overlay"></div>

            <div class="promo-content">

                <span class="badge rounded-0 label-caps py-2 px-3 bg-kinetic-yellow text-dark">

                    MEN PERFORMANCE

                </span>

                <h2 class="text-white mt-3">

                    HASTA 35% OFF

                </h2>

                <p class="text-secondary">

                    Solo esta semana.

                </p>

                <a href="#"
                   class="text-kinetic-yellow text-decoration-none">

                    VER OFERTAS

                </a>

            </div>

        </div>

    </div>

</section>




@endsection
