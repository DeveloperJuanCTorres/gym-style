<!-- Footer -->
<footer>
    <div class="row gy-5">
        <div class="col-lg-4">
            <div class="navbar-brand mb-4 d-block">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="text-decoration: none;">
                    <img src="{{asset('storage/' . $empresa->logo)}}" width="60" alt="">
                    {{$empresa->nombre}}

                </a>
            </div>
            <p class="text-secondary mb-4">Diseñamos el futuro del atletismo. Ropa técnica para quienes no aceptan mediocridad.</p>
            <div class="d-flex gap-4">
                <a href="{{$empresa->link_facebook}}" target="_blank"><i class="fa-brands fa-facebook fs-5"></i></a>
                <a href="{{$empresa->link_instagram}}" target="_blank"><i class="fa-brands fa-instagram fs-5"></i></a>
                <a href="{{$empresa->link_tiktok}}" target="_blank"><i class="fa-brands fa-tiktok fs-5"></i></a>
                <a href="{{$empresa->link_linkedin}}" target="_blank"><i class="fa-brands fa-linkedin fs-5"></i></a>
            </div>
        </div>
        <div class="col-6 col-lg-2">
            <div class="label-caps text-kinetic-yellow mb-4">SOPORTE</div>
            <ul class="list-unstyled d-flex flex-column gap-3">
                <li><a href="#">Centro de Ayuda</a></li>
                <li><a href="#">Seguimiento de Pedidos</a></li>
                <li><a href="#">Métodos de Pago</a></li>
            </ul>
        </div>
        <div class="col-6 col-lg-2">
            <div class="label-caps text-kinetic-yellow mb-4">LEGAL</div>
            <ul class="list-unstyled d-flex flex-column gap-3">
                <li><a href="#">Privacidad</a></li>
                <li><a href="#">Términos</a></li>
                <li><a class="fw-bold text-kinetic-yellow" href="#">Libro de Reclamaciones</a></li>
            </ul>
        </div>
        <div class="col-12 col-lg-4 text-lg-end border-top border-secondary-subtle pt-4 d-lg-block">
            <p class="label-caps text-secondary">© 2026 {{$empresa->nombre}}. TODOS LOS DERECHOS RESERVADOS.</p>
        </div>
    </div>
</footer>