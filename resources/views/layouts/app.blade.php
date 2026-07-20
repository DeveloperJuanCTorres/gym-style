<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <?php
        $version = '1993.4.7';
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
    <link href="{{asset('css/phone.css')}}?v=<?php echo $version ?>" rel="stylesheet">
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

                let offcanvasHtml = '';
                let pageHtml = '';
                let checkoutHtml = '';

                cart.items.forEach(item=>{

                    offcanvasHtml += `
                    <div class="cart-item"
                        data-rowid="${item.rowId}"
                        data-qty="${item.qty}">

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

                        <div class="d-flex flex-column align-items-end">

                            <button
                                class="btn btn-sm text-danger mb-2"
                                onclick="removeItem('${item.rowId}')"
                                title="Eliminar">

                                <i class="fa-solid fa-trash"></i>

                            </button>

                            <div class="qty-box">

                                <button onclick="decreaseQty('${item.rowId}')">
                                    -
                                </button>

                                <span>${item.qty}</span>

                                <button onclick="increaseQty('${item.rowId}')">
                                    +
                                </button>

                            </div>

                        </div>

                    </div>
                    `;

                    pageHtml += `
                    <div class="card border-0 shadow-sm mb-4">

                        <div class="card-body">

                            <div class="row align-items-center">

                                <div class="col-md-2 text-center">

                                    <img
                                        src="${item.options.image}"
                                        class="img-fluid rounded"
                                        style="max-height:120px;object-fit:cover;">

                                </div>

                                <div class="col-md-4">

                                    <h5 class="fw-bold mb-2">
                                        ${item.name}
                                    </h5>

                                    <div class="text-muted">

                                        Color:
                                        <strong>${item.options.color}</strong>

                                    </div>

                                    <div class="text-muted">

                                        Talla:
                                        <strong>${item.options.size}</strong>

                                    </div>

                                    <div class="mt-2">

                                        Precio:
                                        <strong>S/. ${item.price}</strong>

                                    </div>

                                </div>

                                <div class="col-md-3 text-center">

                                    <div
                                        class="qty-box d-inline-flex"
                                        data-rowid="${item.rowId}"
                                        data-qty="${item.qty}">

                                        <button
                                            onclick="decreaseQty('${item.rowId}')">

                                            -

                                        </button>

                                        <span class="px-3">

                                            ${item.qty}

                                        </span>

                                        <button
                                            onclick="increaseQty('${item.rowId}')">

                                            +

                                        </button>

                                    </div>

                                </div>

                                <div class="col-md-2 text-center">

                                    <h5>

                                        S/. ${(item.qty * item.price).toFixed(2)}

                                    </h5>

                                </div>

                                <div class="col-md-1 text-end">

                                    <button
                                        class="btn btn-link text-danger"
                                        onclick="removeItem('${item.rowId}')">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>
                    `;

                    checkoutHtml += `
                    <div class="d-flex mb-3">

                        <div class="me-3">

                            <img
                                src="${item.options.image}"
                                class="rounded"
                                style="width:70px;height:70px;object-fit:cover;">

                        </div>

                        <div class="flex-grow-1">

                            <h6 class="mb-1 fw-bold">

                                ${item.name}

                            </h6>

                            <small class="text-muted">

                                ${item.options.color}
                                ·
                                ${item.options.size}

                            </small>

                            <div class="small text-muted">

                                Cantidad:
                                ${item.qty}

                            </div>

                        </div>

                        <div class="text-end">

                            <strong>

                                S/. ${(item.price * item.qty).toFixed(2)}

                            </strong>

                        </div>

                    </div>
                    `;
                });

                // Actualizar contador del carrito
                document.querySelectorAll('.cartCount').forEach(el => {
                    el.innerHTML = cart.count;
                });

                // ===========================
                // OFFCANVAS
                // ===========================

                if (document.getElementById('cartItems')) {

                    document.getElementById('cartItems').innerHTML = offcanvasHtml;

                    document.getElementById('cartSubtotal').innerHTML =
                        'S/.' + cart.subtotal;

                    document.getElementById('cartTotal').innerHTML =
                        'S/.' + cart.total;
                }

                // ===========================
                // PÁGINA DEL CARRITO
                // ===========================

                if (document.getElementById('cartPageItems')) {

                    document.getElementById('cartPageItems').innerHTML = pageHtml;

                    document.getElementById('pageSubtotal').innerHTML =
                        'S/.' + cart.subtotal;

                    document.getElementById('pageTotal').innerHTML =
                        'S/.' + cart.total;
                }

                // ===========================
                // CHECKOUT
                // ===========================

                if (document.getElementById('checkoutItems')) {

                    document.getElementById('checkoutItems').innerHTML =
                        checkoutHtml;

                    document.getElementById('checkoutSubtotal').innerHTML =
                        'S/. ' + cart.subtotal;

                    document.getElementById('checkoutTotal').innerHTML =
                        'S/. ' + cart.total;
                }

            });
        }

        function updateQty(rowId, qty)
        {
            fetch('/cart/update', {

                method: 'POST',

                headers: {

                    'Content-Type': 'application/json',

                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]').content

                },

                body: JSON.stringify({

                    rowId: rowId,
                    qty: qty

                })

            })
            .then(r => r.json())
            .then(data => {

                loadCart();

            });
        }

        function increaseQty(rowId)
        {
            const item = document.querySelector(`[data-rowid="${rowId}"]`);

            const qty = parseInt(item.dataset.qty);

            updateQty(rowId, qty + 1);
        }

        function decreaseQty(rowId)
        {
            const item = document.querySelector(`[data-rowid="${rowId}"]`);

            const qty = parseInt(item.dataset.qty);

            if (qty <= 1) {

                removeItem(rowId);

                return;
            }

            updateQty(rowId, qty - 1);
        }

        function removeItem(rowId)
        {
            Swal.fire({

                title: '¿Eliminar producto?',
                text: 'Se quitará del carrito.',
                icon: 'warning',

                showCancelButton: true,

                confirmButtonText: 'Sí, eliminar',

                cancelButtonText: 'Cancelar'

            }).then((result) => {

                if (!result.isConfirmed) return;

                fetch('/cart/remove/' + rowId, {

                    method: 'DELETE',

                    headers: {
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]').content
                    }

                })
                .then(r => r.json())
                .then(data => {

                    loadCart();

                    Toast.fire({
                        icon: 'success',
                        title: 'Producto eliminado'
                    });

                });

            });
        }
    </script>

    <script>
        let currentProduct = null;
        let selectedColor = null;
        let selectedSize = null;
        let selectedVariant = null;

        function loadProduct(id)
        {
            selectedColor = null;
            selectedSize = null;
            selectedVariant = null;

            document.getElementById('modalSizes').innerHTML = '';
            document.getElementById('modalStock').innerHTML = '';
            document.getElementById('modalSku').innerHTML = '';
            document.getElementById('modalColors').innerHTML = '';
            document.getElementById('modalGallery').innerHTML = '';

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
                        class="btn btn-outline-light color-btn me-2 mb-2"
                        onclick="selectColor(${color.id}, this)">

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

        function selectColor(colorId, btn)
        {
            selectedColor = colorId;
            selectedVariant = null;
            selectedSize = null;

            document.getElementById('modalStock').innerHTML = '';
            document.getElementById('modalSku').innerHTML = '';

            // Quitar selección anterior
            document.querySelectorAll('.color-btn').forEach(item => {

                item.classList.remove('btn-warning');
                item.classList.add('btn-outline-light');

            });

            // Pintar botón seleccionado
            btn.classList.remove('btn-outline-light');
            btn.classList.add('btn-warning');

            let variants = currentProduct.variants.filter(v => v.color_id == colorId);

            if (variants.length > 0 && variants[0].image) {

                document.getElementById('modalImage').src =
                    '/storage/' + variants[0].image.replace(/\\/g,'/');

            }

            renderSizes(variants);
        }

        function renderSizes(variants)
        {
            let html = '';

            variants.forEach(v => {

                html += `
                    <button
                        class="btn btn-outline-secondary size-btn me-2 mb-2"
                        onclick="selectSize(${v.id}, this)">

                        ${v.size.name}

                    </button>
                `;
            });

            document.getElementById('modalSizes').innerHTML = html;
        }

        function selectSize(variantId, btn)
        {
            selectedVariant = variantId;

            document.querySelectorAll('.size-btn').forEach(item => {

                item.classList.remove('btn-warning');
                item.classList.add('btn-outline-secondary');

            });

            btn.classList.remove('btn-outline-secondary');
            btn.classList.add('btn-warning');

            let variant = currentProduct.variants.find(v => v.id == variantId);

            document.getElementById('modalStock').innerHTML =
                'Stock disponible: ' + variant.stock;

            document.getElementById('modalSku').innerHTML =
                'SKU: ' + variant.sku;
        }

        const btnAddToCart = document.getElementById('btnAddToCart');

        if (btnAddToCart) {

            btnAddToCart.addEventListener('click', function (){

                if (!selectedColor) {

                    Toast.fire({
                        icon: 'warning',
                        title: 'Seleccione un color'
                    });

                    return;
                }

                if (!selectedVariant) {

                    Toast.fire({
                        icon: 'warning',
                        title: 'Seleccione una talla'
                    });

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
        }


        document.addEventListener('DOMContentLoaded', function () {
            loadCart();
        });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{asset('js/phone.js')}}"></script>
    <script src="{{asset('js/ubigeo.js')}}"></script>
</body>
</html>
