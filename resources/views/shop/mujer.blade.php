@extends('layouts.app')

@section('content')

<!-- =========================================
HERO MUJER
========================================= -->

<section class="hero-section">

    <img
        class="hero-img"
        src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=1800"
        alt="Women Collection">

    <div class="hero-overlay"></div>

    <div class="hero-content container">

        <span
            class="label-caps text-kinetic-yellow mb-3 d-block"
            style="letter-spacing:.4em;">

            WOMEN COLLECTION

        </span>

        <h1 class="display-kinetic text-white">

            MOVE
            <br>
            WITH STYLE

        </h1>

        <p class="text-secondary fs-5 mt-4">

            Ropa deportiva diseñada para sentirte cómoda,
            fuerte y segura en cada entrenamiento.

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

        <div class="row g-4">

            <div class="col-md-3">

                <div class="promo-card">

                    <img src="https://picsum.photos/500/700?random=21">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">

                        <h4 class="text-white">

                            LEGGINGS

                        </h4>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="promo-card">

                    <img src="https://picsum.photos/500/700?random=22">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">

                        <h4 class="text-white">

                            TOPS

                        </h4>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="promo-card">

                    <img src="https://picsum.photos/500/700?random=23">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">

                        <h4 class="text-white">

                            SHORTS

                        </h4>

                    </div>

                </div>

            </div>

            <div class="col-md-3">

                <div class="promo-card">

                    <img src="https://picsum.photos/500/700?random=24">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">

                        <h4 class="text-white">

                            CONJUNTOS

                        </h4>

                    </div>

                </div>

            </div>

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

                <span class="label-caps text-kinetic-yellow">

                    WOMEN COLLECTION

                </span>

                <h2 class="text-white h1 mt-2">

                    NUEVA COLECCIÓN

                </h2>

            </div>

            <a href="#"
                class="text-secondary text-decoration-none">

                VER TODO →

            </a>

        </div>

        <div class="row g-4">

            @for($i=1;$i<=8;$i++)

                <div class="col-md-6 col-lg-3">

                <div class="product-card">

                    <div class="product-img-wrapper">

                        <img src="https://picsum.photos/500/700?random={{$i+50}}">

                        <button class="btn btn-add-cart">

                            AÑADIR AL CARRITO

                        </button>

                    </div>

                    <div class="d-flex justify-content-between">

                        <div>

                            <h3 class="text-white fs-6">

                                FIT COLLECTION

                            </h3>

                            <span class="text-secondary">

                                TOP + LEGGING

                            </span>

                        </div>

                        <div>

                            <span class="text-white fw-bold">

                                S/.119

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
LIFESTYLE
========================================= -->

<section class="promo-section">

    <div class="container-fluid px-md-5">

        <div class="promo-card">

            <img src="https://images.unsplash.com/photo-1518611012118-696072aa579a?w=1600">

            <div class="promo-overlay"></div>

            <div class="promo-content">

                <span
                    class="badge rounded-0 bg-kinetic-yellow text-dark">

                    NEW DROP

                </span>

                <h2 class="text-white mt-4">

                    TRAIN.
                    LOOK GOOD.

                </h2>

                <p class="text-secondary">

                    La colección más esperada del año.

                </p>

                <button class="btn btn-kinetic-primary">

                    COMPRAR

                </button>

            </div>

        </div>

    </div>

</section>



<!-- =========================================
LOOK COMPLETO
========================================= -->

<section class="product-section">

    <div class="container-fluid px-md-5">

        <div class="row g-4">

            <div class="col-lg-6">

                <div class="promo-card">

                    <img src="https://picsum.photos/800/900?random=90">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">

                        <h2 class="text-white">

                            LOOK COMPLETO

                        </h2>

                        <p class="text-secondary">

                            Combina tus prendas favoritas.

                        </p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="promo-card">

                    <img src="https://picsum.photos/800/900?random=91">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">

                        <h2 class="text-white">

                            ACTIVE LIFESTYLE

                        </h2>

                        <p class="text-secondary">

                            Diseñado para cualquier momento del día.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



@endsection