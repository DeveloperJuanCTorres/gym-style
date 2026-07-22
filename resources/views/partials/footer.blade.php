<!-- Footer -->
<footer>
    <div class="row gy-5">

        <!-- Empresa -->
        <div class="col-lg-4">
            <div class="navbar-brand mb-4 d-block">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="text-decoration: none;">
                    <img src="{{ asset('storage/' . $empresa->logo) }}" width="60" alt="">
                    {{ $empresa->nombre }}
                </a>
            </div>

            <p class="text-secondary mb-4">
                Diseñamos el futuro del atletismo. Ropa técnica para quienes no aceptan mediocridad.
            </p>
            
            <!-- Redes Sociales -->
            <div class="d-flex gap-4">
                <a href="{{ $empresa->link_facebook }}" target="_blank">
                    <i class="fa-brands fa-facebook fs-5"></i>
                </a>

                <a href="{{ $empresa->link_instagram }}" target="_blank">
                    <i class="fa-brands fa-instagram fs-5"></i>
                </a>

                <a href="{{ $empresa->link_tiktok }}" target="_blank">
                    <i class="fa-brands fa-tiktok fs-5"></i>
                </a>

                <a href="{{ $empresa->link_linkedin }}" target="_blank">
                    <i class="fa-brands fa-linkedin fs-5"></i>
                </a>
            </div>
        </div>

        <!-- Enlaces -->
        <div class="col-6 col-lg-2">
            <div class="label-caps text-kinetic-yellow mb-4">ENLACES RÁPIDOS</div>
            <ul class="list-unstyled d-flex flex-column gap-3">
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('shop.hombre') }}">Hombre</a></li>
                <li><a href="{{ route('shop.mujer') }}">Mujer</a></li>
                <li><a href="{{ route('shop.accesorios') }}">Accesorios</a></li>
            </ul>
        </div>

        <!-- Legal -->
        <div class="col-6 col-lg-2">
            <div class="label-caps text-kinetic-yellow mb-4">LEGAL</div>
            <ul class="list-unstyled d-flex flex-column gap-3">
                <li><a href="{{ route('terminos') }}">Términos y Condiciones</a></li>
                <li><a href="{{ route('politicas') }}">Política de cambios y/o devoluciones</a></li>
                <li>
                    <a class="fw-bold text-kinetic-yellow" href="{{ route('libro-reclamaciones') }}">
                        Libro de Reclamaciones
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Copyright -->
        <div class="col-12 col-lg-4 border-secondary-subtle d-lg-block">
            <!-- Información de la empresa -->
            <div class="mb-4">
                <ul class="list-unstyled small text-secondary mb-0">

                    <li class="mb-2">
                        <i class="fa-solid fa-building text-kinetic-yellow me-2"></i>
                        <strong>Empresa:</strong> {{ $empresa->nombre }}
                    </li>

                    <li class="mb-2">
                        <i class="fa-solid fa-id-card text-kinetic-yellow me-2"></i>
                        <strong>RUC:</strong> {{ $empresa->ruc }}
                    </li>

                    <li class="mb-2">
                        <i class="fa-solid fa-phone text-kinetic-yellow me-2"></i>
                        <a href="tel:{{ $empresa->telefono }}">
                            {{ $empresa->telefono }}
                        </a>
                    </li>

                    <li class="mb-2">
                        <i class="fa-solid fa-envelope text-kinetic-yellow me-2"></i>
                        <a href="mailto:{{ $empresa->correo }}">
                            {{ $empresa->email }}
                        </a>
                    </li>

                </ul>
            </div>
            <div class="border-top pt-4">
                <p class="label-caps text-secondary">
                    © 2026 {{ $empresa->nombre }}. TODOS LOS DERECHOS RESERVADOS.
                </p>
            </div>
        </div>

    </div>
</footer>