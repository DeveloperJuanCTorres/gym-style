@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section">

    <img id="heroImage"
         class="hero-img"
         src="{{ asset('storage/' . $banners[0]->imagen) }}"
         alt="Banner">

    <div class="hero-overlay"></div>

    <div class="hero-content container">

        <span id="heroTitulo"
              class="label-caps text-kinetic-yellow mb-3 d-block"
              style="letter-spacing:0.4em;">
            {{ $banners[0]->titulo }}
        </span>

        <h1 id="heroDescripcion" class="display-kinetic text-white">
            {{ $banners[0]->descripcion }}
        </h1>

        <div class="d-flex flex-column flex-md-row gap-3 justify-content-center mt-5">
            <a href="{{ route('shop.hombre') }}" class="btn btn-kinetic-primary">Explorar Hombre</a>
            <a href="{{ route('shop.mujer') }}" class="btn btn-kinetic-outline">Explorar Mujer</a>
        </div>

    </div>

</section>


<!-- Promos -->
<section class="promo-section">
    <div class="container-fluid px-md-5">
        <div class="row g-4">
            @php
                $hombre = $categorias->firstWhere('nombre', 'hombre');
                $mujer = $categorias->firstWhere('nombre', 'mujer');
            @endphp

            <div class="col-md-6">
                <div class="promo-card">
                    <img src="{{ asset('storage/' . $hombre->imagen) }}" alt="{{ $hombre->nombre }}">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">
                        <span class="badge rounded-0 mb-3 label-caps py-2 px-3 text-dark bg-kinetic-yellow">
                            CATEGORÍA
                        </span>

                        <h2 class="text-white mb-2">
                            {{ strtoupper($hombre->titulo) }}
                        </h2>

                        <p class="text-secondary mb-4">
                            {{ $hombre->descripcion }}
                        </p>

                        <a href="{{ route('shop.hombre') }}"
                            class="text-kinetic-yellow label-caps text-decoration-none border-bottom border-warning">
                            VER AHORA
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="promo-card">
                    <img src="{{ asset('storage/' . $mujer->imagen) }}" alt="{{ $mujer->nombre }}">

                    <div class="promo-overlay"></div>

                    <div class="promo-content">
                        <span class="badge rounded-0 mb-3 label-caps py-2 px-3 text-dark bg-kinetic-yellow">
                            CATEGORÍA
                        </span>

                        <h2 class="text-white mb-2">
                            {{ strtoupper($mujer->titulo) }}
                        </h2>

                        <p class="text-secondary mb-4">
                            {{ $mujer->descripcion }}
                        </p>

                        <a href="{{ route('shop.mujer') }}"
                            class="text-kinetic-yellow label-caps text-decoration-none border-bottom border-warning">
                            VER AHORA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Best Sellers -->
<section class="product-section">
    <div class="container-fluid px-md-5">
        <div class="d-flex justify-content-between align-items-end mb-5">
            <div>
                <span class="label-caps text-kinetic-yellow mb-2 d-block">Best Sellers</span>
                <h2 class="text-white mb-0 h1">PRODUCTOS DESTACADOS</h2>
            </div>
            <a class="text-secondary label-caps text-decoration-none border-bottom border-secondary-subtle pb-1" href="#">VER TODO EL CATÁLOGO</a>
        </div>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-sm-6 col-lg-3">

                <div class="product-card">

                    <div class="product-img-wrapper">

                        <img
                            src="{{ Voyager::image($product->image) }}"
                            alt="{{ $product->name }}">

                        <div class="position-absolute top-0 start-0 p-3">

                            <span class="badge badge-new rounded-0">

                                Nuevo

                            </span>

                        </div>

                        <!-- <button class="btn btn-add-cart">

                            AÑADIR AL CARRITO

                        </button> -->

                        

                    </div>

                    <div class="d-flex justify-content-between">

                        <div>

                            <h3 class="text-white fs-6 text-uppercase mb-1">

                                {{ $product->name }}

                            </h3>

                            <span class="label-caps text-kinetic-yellow">
                                @php
                                    $sizes = $product->variants
                                        ->pluck('size.name')
                                        ->filter()
                                        ->unique()
                                        ->implode(' / ');
                                @endphp

                                {{ $sizes }}

                            </span>

                        </div>

                        <div class="text-end">

                            <span class="text-white fw-bold fs-5">

                                S/. {{ number_format($product->price,2) }}

                            </span>

                        </div>

                    </div>
                    <button
                            class="btn btn-outline-light btn-sm mt-2 w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#productModal"
                            onclick="loadProduct({{ $product->id }})">

                            VER DETALLE

                        </button>

                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Disciplines Bento -->
<section class="bento-section">
    <div class="container-fluid px-md-5">
        <h2 class="text-white display-5 mb-5">EXPLORA TU DISCIPLINA</h2>
        <div class="row g-4" style="min-height: 700px;">
            @php
                $hombre = $categorias->firstWhere('nombre', 'hombre');
                $mujer = $categorias->firstWhere('nombre', 'mujer');
                $accesorio = $categorias->firstWhere('nombre', 'accesorios');
            @endphp
            <div class="col-md-8">
                <div class="bento-item h-100">
                    <img alt="{{$accesorio->nombre}}" src="{{asset('storage/' . $accesorio->imagen)}}" />
                    <div class="bento-overlay"></div>
                    <div class="bento-content">
                        <h3 class="display-3 text-white mb-4">{{$accesorio->titulo}}</h3>
                        <p class="text-secondary mb-4">
                            {{ $accesorio->descripcion }}
                        </p>
                        <a class="text-kinetic-yellow label-caps text-decoration-none d-flex align-items-center gap-2 group-link" href="{{route('shop.accesorios')}}">
                            VER COLECCIÓN <i class="fa-solid fa-arrow-right transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-column gap-4 h-100">
                    <div class="bento-item flex-grow-1">
                        <img alt="{{$hombre->nombre}}" src="{{asset('storage/' . $hombre->imagen)}}" />
                        <div class="bento-overlay"></div>
                        <div class="bento-content p-4">
                            <h3 class="h2 text-white mb-2">{{$hombre->titulo}}</h3>
                            <p class="text-secondary mb-4">
                                {{ $hombre->descripcion }}
                            </p>
                            <a class="text-kinetic-yellow label-caps text-decoration-none d-flex align-items-center gap-2 group-link" 
                                href="{{route('shop.hombre')}}">
                                VER TODO <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bento-item flex-grow-1">
                        <img alt="{{$mujer->nombre}}" src="{{asset('storage/' . $mujer->imagen)}}" />
                        <div class="bento-overlay"></div>
                        <div class="bento-content p-4">
                            <h3 class="h2 text-white mb-2">{{$mujer->titulo}}</h3>
                            <p class="text-secondary mb-4">
                                {{ $mujer->descripcion }}
                            </p>
                            <a class="text-kinetic-yellow label-caps text-decoration-none d-flex align-items-center gap-2 group-link" 
                                href="{{route('shop.mujer')}}">
                                VER TODO <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter -->
<section class="newsletter-section">
    <div class="container">
        <div class="text-center max-w-700 mx-auto">
            <i class="fa-solid fa-bolt text-kinetic-yellow display-4 mb-4"></i>
            <h2 class="display-5 text-white mb-3">ÚNETE A LA ÉLITE</h2>
            <p class="fs-5 text-secondary mb-5">Recibe acceso anticipado a lanzamientos, entrenamientos exclusivos y ofertas solo para miembros.</p>
            <form class="row g-3 justify-content-center">
                <div class="col-md-7">
                    <input class="form-control newsletter-input" placeholder="TU EMAIL DE ALTO RENDIMIENTO" type="email" />
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-kinetic-primary px-5" type="submit">SUSCRIBIRME</button>
                </div>
            </form>
            <p class="label-caps text-secondary mt-4" style="font-size: 10px;">Al suscribirte, aceptas nuestra política de privacidad y términos de servicio.</p>
        </div>
    </div>
</section>

<div
    class="modal fade"
    id="productModal"
    tabindex="-1">

    <div class="modal-dialog modal-xl modal-dialog-centered">

        <div class="modal-content bg-dark text-white border-0">

            <div class="modal-body p-0">

                <div class="row g-0">

                    <div class="col-lg-6">

                        <img
                            id="modalImage"
                            class="w-100 h-100 object-fit-cover">

                        <div
                            id="modalGallery"
                            class="d-flex gap-2 mt-3 flex-wrap">
                        </div>

                    </div>

                    <div class="col-lg-6 p-5">

                        <span
                            id="modalBrand"
                            class="text-warning small">
                        </span>

                        <h2 id="modalName"></h2>

                        <h3 id="modalPrice"></h3>

                        <div
                            id="modalDescription"
                            class="text-secondary mt-4">
                        </div>

                        <div class="mt-4">

                            <h6 class="fw-bold">
                                Color
                            </h6>

                            <div id="modalColors"></div>

                        </div>

                        <div class="mt-4">

                            <h6>Tallas disponibles</h6>

                            <div id="modalSizes"></div>

                        </div>

                        <div class="mt-4">

                            <div id="modalStock"></div>

                            <div id="modalSku"></div>

                        </div>

                        <button id="btnAddToCart"
                            class="btn btn-kinetic-primary w-100 mt-4">

                            Añadir al carrito

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    const banners = @json($banners);

    let actual = 0;

    setInterval(() => {

        actual++;

        if(actual >= banners.length){
            actual = 0;
        }

        document.getElementById("heroImage").src =
            "/storage/" + banners[actual].imagen;

        document.getElementById("heroTitulo").innerHTML =
            banners[actual].titulo;

        document.getElementById("heroDescripcion").innerHTML =
            banners[actual].descripcion;

    },5000);

</script>

<!-- <script>
    let currentProduct = null;
    let selectedColor = null;
    let selectedSize = null;

    function loadProduct(id)
    {
        fetch('/producto/' + id + '/detalle')
        .then(response => response.json())
        .then(product => {

            currentProduct = product;

            document.getElementById('modalName')
                .innerHTML = product.name;

            document.getElementById('modalBrand')
                .innerHTML = product.brand.nombre;

            document.getElementById('modalPrice')
                .innerHTML = 'S/. ' + product.price;

            document.getElementById('modalDescription')
                .innerHTML = product.description;

            document.getElementById('modalImage')
                .src = '/storage/' + product.image;

            renderGallery(product);
            renderColors(product);

        });
    }

    function renderGallery(product)
    {
        let html = '';

        html += `
            <img
                src="/storage/${product.image.replace(/\\/g,'/')}"
                class="thumb-image"
                onclick="changeMainImage('/storage/${product.image.replace(/\\/g,'/')}')">
        `;

        product.variants.forEach(v => {

            if(v.image)
            {
                let img = v.image.replace(/\\/g,'/');

                html += `
                    <img
                        src="/storage/${img}"
                        class="thumb-image"
                        onclick="changeMainImage('/storage/${img}')">
                `;
            }
        });

        document.getElementById('modalGallery').innerHTML = html;
    }

    function renderColors(product)
    {
        let colors = [];

        product.variants.forEach(v => {

            if(!colors.find(c => c.id == v.color.id))
            {
                colors.push(v.color);
            }
        });

        let html = '';

        colors.forEach(color => {

            html += `
                <button
                    class="btn btn-outline-light me-2 mb-2"
                    onclick="selectColor(${color.id})">

                    ${color.name}

                </button>
            `;
        });

        document.getElementById('modalColors').innerHTML = html;
    }

    function changeMainImage(src)
    {
        document.getElementById('modalImage').src = src;
    }

    function selectColor(colorId)
    {
        selectedColor = colorId;

        let variants = currentProduct.variants
            .filter(v => v.color_id == colorId);

        if(variants.length > 0)
        {
            if(variants[0].image)
            {
                document.getElementById('modalImage')
                .src = '/storage/' + variants[0].image;
            }
        }

        renderSizes(variants);
    }

    function renderSizes(variants)
    {
        let html = '';

        variants.forEach(v => {

            html += `
                <button
                    class="btn btn-outline-secondary me-2 mb-2"
                    onclick="selectSize(${v.id})">

                    ${v.size.name}

                </button>
            `;
        });

        document.getElementById('modalSizes').innerHTML = html;
    }

    function selectSize(variantId)
    {
        let variant = currentProduct.variants
            .find(v => v.id == variantId);

        document.getElementById('modalStock')
            .innerHTML =
            'Stock disponible: ' + variant.stock;

        document.getElementById('modalSku')
            .innerHTML =
            'SKU: ' + variant.sku;
    }

</script> -->

@endsection
