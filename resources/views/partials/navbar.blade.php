<!-- ===========================
NAVBAR
=========================== -->

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top">

    <div class="container-fluid px-lg-5">

        <!-- LOGO -->

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">

            GYM STYLE

        </a>

        <!-- MOBILE -->

        <div class="d-flex align-items-center gap-3 d-lg-none">

            <a href="#" class="nav-icon position-relative">

                <i class="fa-solid fa-cart-shopping"></i>

                <span
                    id="cartCount"
                    class="badge rounded-pill bg-warning text-dark">

                    0

                </span>

            </a>

            <button
                class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileMenu">

                <i class="fa-solid fa-bars fs-4"></i>

            </button>

        </div>

        <!-- DESKTOP -->

        <div class="collapse navbar-collapse d-none d-lg-flex">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">

                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">

                        Inicio

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('shop.hombre') }}"
                        class="nav-link {{ request()->routeIs('shop.hombre') ? 'active' : '' }}">

                        Hombre

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('shop.mujer') }}"
                        class="nav-link {{ request()->routeIs('shop.mujer') ? 'active' : '' }}">

                        Mujer

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                        class="nav-link">

                        Accesorios

                    </a>

                </li>

                <li class="nav-item">

                    <a href="#"
                        class="nav-link text-warning">

                        Promociones

                    </a>

                </li>

            </ul>

            <form class="d-flex ms-auto">

                <div class="input-group">

                    <input
                        class="form-control search-input"
                        placeholder="Buscar productos...">

                    <button class="btn btn-warning">

                        <i class="fa fa-search"></i>

                    </button>

                </div>

            </form>

            <div class="d-flex align-items-center gap-4 ms-4">

                <a href="#" class="nav-icon">

                    <i class="fa-regular fa-user"></i>

                </a>

                <a
                    href="#"
                    class="nav-icon position-relative"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#cartOffcanvas">

                    <i class="fa-solid fa-cart-shopping"></i>

                    <span
                        id="cartCount"
                        class="badge rounded-pill bg-warning text-dark">

                        2

                    </span>

                </a>

            </div>

        </div>

    </div>

</nav>



<!-- ===========================
OFFCANVAS MOBILE
=========================== -->

<div
    class="offcanvas offcanvas-start bg-black text-white"
    tabindex="-1"
    id="mobileMenu">

    <div class="offcanvas-header">

        <h3 class="text-warning fw-bold">

            GYM STYLE

        </h3>

        <button
            class="btn-close btn-close-white"
            data-bs-dismiss="offcanvas">

        </button>

    </div>

    <div class="offcanvas-body">

        <div class="mb-4">

            <input
                class="form-control"
                placeholder="Buscar productos...">

        </div>

        <ul class="navbar-nav">

            <li class="nav-item mb-2">

                <a
                    href="{{ route('home') }}"
                    class="nav-link text-white">

                    Inicio

                </a>

            </li>

            <li class="nav-item mb-2">

                <a
                    href="{{ route('shop.hombre') }}"
                    class="nav-link text-white">

                    Hombre

                </a>

            </li>

            <li class="nav-item mb-2">

                <a
                    href="{{ route('shop.mujer') }}"
                    class="nav-link text-white">

                    Mujer

                </a>

            </li>

            <li class="nav-item mb-2">

                <a
                    href="#"
                    class="nav-link text-white">

                    Accesorios

                </a>

            </li>

            <li class="nav-item mb-4">

                <a
                    href="#"
                    class="nav-link text-warning">

                    Promociones

                </a>

            </li>

        </ul>

        <hr>

        <a href="#" class="d-block text-white mb-3">

            <i class="fa-regular fa-user me-2"></i>

            Mi cuenta

        </a>

        <a
            href="#"
            class="nav-icon position-relative"
            data-bs-toggle="offcanvas"
            data-bs-target="#cartOffcanvas">

            <i class="fa-solid fa-cart-shopping me-2"></i>

            Mi carrito

        </a>

        <a href="#" class="d-block text-white mb-3">

            <i class="fa-regular fa-heart me-2"></i>

            Favoritos

        </a>

        <div class="mt-5">

            <div class="p-4 rounded-4 bg-dark text-center">

                <small class="text-warning">

                    NUEVA COLECCIÓN

                </small>

                <h4 class="mt-2">

                    Hasta 30% OFF

                </h4>

                <button class="btn btn-warning mt-2">

                    Comprar

                </button>

            </div>

        </div>

    </div>

</div>



<!-- =========================================
CART OFFCANVAS
========================================= -->

<div
    class="offcanvas offcanvas-end cart-offcanvas"
    tabindex="-1"
    id="cartOffcanvas">

    <div class="offcanvas-header border-bottom">

        <h4 class="fw-bold">

            Mi Carrito

        </h4>

        <button
            class="btn-close"
            data-bs-dismiss="offcanvas">

        </button>

    </div>

    <div class="offcanvas-body p-0">

        <!-- ITEM -->

        @for($i=1;$i<=3;$i++)

        <div class="cart-item">

            <img
                src="https://picsum.photos/120/120?random={{$i}}">

            <div class="flex-grow-1">

                <h6>

                    Performance Shirt

                </h6>

                <small class="text-muted">

                    Negro · M

                </small>

                <div class="mt-2 fw-bold">

                    S/.89

                </div>

            </div>

            <div class="qty-box">

                <button>-</button>

                <span>1</span>

                <button>+</button>

            </div>

        </div>

        @endfor

    </div>

    <div class="cart-footer">

        <div class="d-flex justify-content-between mb-2">

            <span>

                Subtotal

            </span>

            <strong>

                S/.267

            </strong>

        </div>

        <div class="d-flex justify-content-between mb-3">

            <span>

                Envío

            </span>

            <span class="text-success">

                Gratis

            </span>

        </div>

        <hr>

        <div class="d-flex justify-content-between mb-4">

            <h5>

                Total

            </h5>

            <h5>

                S/.267

            </h5>

        </div>

        <button class="btn btn-warning w-100 mb-2">

            FINALIZAR COMPRA

        </button>

        <button class="btn btn-dark w-100">

            VER CARRITO

        </button>

    </div>

</div>
