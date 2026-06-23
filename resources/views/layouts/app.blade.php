<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <?php
        $version = '1993.4.6';
    ?>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

     <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;600;700;800;900&amp;family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@600&amp;display=swap" rel="stylesheet" />

    <link href="{{asset('css/styles.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('css/topbar.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
    <div>
        @include('partials.navbar')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
            didOpen: (toast) => {

                toast.addEventListener(
                    'mouseenter',
                    Swal.stopTimer
                );

                toast.addEventListener(
                    'mouseleave',
                    Swal.resumeTimer
                );
            }
        });
    </script>

    <script>
        function loadCart()
        {
            fetch('/cart/content')
            .then(r=>r.json())
            .then(cart=>{

                let html = '';

                cart.items.forEach(item=>{

                    html += `
                    <div class="cart-item">

                        <img
                        src="${item.options.image}">

                        <div class="flex-grow-1">

                            <h6>
                                ${item.name}
                            </h6>

                            <small>

                                ${item.options.color}
                                ·
                                ${item.options.size}

                            </small>

                            <div class="mt-2 fw-bold">

                                S/.${item.price}

                            </div>

                        </div>

                        <div class="qty-box">

                            <button
                            onclick="decreaseQty('${item.rowId}')">

                            -

                            </button>

                            <span>

                            ${item.qty}

                            </span>

                            <button
                            onclick="increaseQty('${item.rowId}')">

                            +

                            </button>

                        </div>

                    </div>
                    `;
                });

                document.querySelectorAll('.cartCount')
                .forEach(el => {
                    el.innerHTML = cart.count;
                });

                document.getElementById('cartItems')
                .innerHTML = html;

                document
                .querySelector('#cartSubtotal')
                .innerHTML =
                'S/.'+cart.subtotal;

                document
                .querySelector('#cartTotal')
                .innerHTML =
                'S/.'+cart.total;

            });
        }
    </script>

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

                Toast.fire({
                    icon: 'success',
                    title: 'Producto agregado al carrito'
                });

            });

        });


        document.addEventListener('DOMContentLoaded', function () {
            loadCart();
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
