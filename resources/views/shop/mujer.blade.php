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

<div class="container d-lg-none py-3">

    <button
        class="mobile-filter-btn"
        data-bs-toggle="offcanvas"
        data-bs-target="#mobileFilters">

        <i class="fa-solid fa-sliders"></i>

        <span>Filtros</span>

        <span class="filter-count">
            24
        </span>

    </button>

</div>

<!-- =========================================
CATEGORIAS
========================================= -->

<section class="shop-toolbar d-none d-lg-block">

    <div class="container-fluid px-md-5">

        <div class="toolbar-wrapper">

            <div class="toolbar-left">

                <span class="products-count">
                    {{ $products->total() }} Productos
                </span>

            </div>

            <div class="toolbar-center">

                <select class="toolbar-select"
                    onchange="window.location=this.value">

                    <option value="">
                        Todas las categorías
                    </option>

                    @foreach($types as $type)

                    <option
                        value="{{ request()->fullUrlWithQuery(['type'=>$type->id]) }}"
                        {{ request('type') == $type->id ? 'selected' : '' }}>

                        {{ $type->name }}

                    </option>

                    @endforeach

                </select>

                <select class="toolbar-select"
                    onchange="window.location=this.value">

                    <option value="">
                        Todas las marcas
                    </option>

                    @foreach($brands as $brand)

                    <option
                        value="{{ request()->fullUrlWithQuery(['brand'=>$brand->id]) }}"
                        {{ request('brand') == $brand->id ? 'selected' : '' }}>

                        {{ $brand->nombre }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="toolbar-right">

                <select class="toolbar-select"
                    onchange="window.location=this.value">

                    <option value="{{ request()->url() }}">
                        Ordenar
                    </option>

                    <option
                        value="{{ request()->fullUrlWithQuery(['sort'=>'newest']) }}">
                        Más recientes
                    </option>

                    <option
                        value="{{ request()->fullUrlWithQuery(['sort'=>'price_asc']) }}">
                        Precio ↑
                    </option>

                    <option
                        value="{{ request()->fullUrlWithQuery(['sort'=>'price_desc']) }}">
                        Precio ↓
                    </option>

                </select>

            </div>

        </div>

    </div>

</section>

<div class="offcanvas offcanvas-end bg-black"
    id="mobileFilters">

    <div class="offcanvas-header border-bottom border-dark">

        <h5 class="text-white fw-bold">
            FILTROS
        </h5>

        <button class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas">
        </button>

    </div>

    <div class="offcanvas-body">

        <div class="filter-group">

            <h6>CATEGORÍAS</h6>

            <div class="filter-chip">Polos</div>
            <div class="filter-chip">Shorts</div>
            <div class="filter-chip">Joggers</div>

        </div>

        <div class="filter-group mt-4">

            <h6>MARCAS</h6>

            <div class="filter-chip">Nike</div>
            <div class="filter-chip">Adidas</div>
            <div class="filter-chip">Gymshark</div>

        </div>

        <button class="btn btn-light w-100 py-3 mt-5">
            VER PRODUCTOS
        </button>

    </div>

</div>


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

            @foreach($products as $product)

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

                        <!-- <button class="btn btn-add-cart" id="btnAddToCart">

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

                        <button
                            class="btn btn-kinetic-primary w-100 mt-4" id="btnAddToCart">

                            Añadir al carrito

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- 
<script>
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
        selectedVariant = variantId;

        let variant = currentProduct.variants
            .find(v => v.id == variantId);

        document.getElementById('modalStock')
            .innerHTML =
            'Stock disponible: ' + variant.stock;

        document.getElementById('modalSku')
            .innerHTML =
            'SKU: ' + variant.sku;
    }
    
    document
    .getElementById('btnAddToCart')
    .addEventListener('click',function(){

        if(!selectedVariant)
        {
            alert('Seleccione una talla');
            return;
        }

        fetch('/cart/add',{

            method:'POST',

            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':
                document
                .querySelector(
                    'meta[name="csrf-token"]'
                ).content
            },

            body:JSON.stringify({

                variant_id:selectedVariant

            })

        })
        .then(r=>r.json())
        .then(data=>{

            loadCart();

        });

    });
</script> -->


@endsection