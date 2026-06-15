@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <img alt="Athlete" class="hero-img" src="https://lh3.googleusercontent.com/aida-public/AB6AXuANw0Y9wBC79G_77ZXWQ5sMmXZrXII8Cc30FQl2Lwq96ToB5CXvPmn0beBw4aoT8TejMhlKW4IR6KoDDye1ifkOkPRBUED98YVZxRU6XtIn-tReteU5cSV_ncWURNOs9uzxNuGbfEWSAEENYkVsmCq_X81b_ubVmaFBBTdVxvA6aGV48Fod5UjPrlZjEPSPBl9nYsxGAaNIKUdurzoOyrvYWG0KZ1zVxbMlQ1TcFijN2OtXsvoJKAvcHsOM9oj_L_8bZC9XufVTcMc" />
    <div class="hero-overlay"></div>
    <div class="hero-content container">
        <span class="label-caps text-kinetic-yellow mb-3 d-block" style="letter-spacing: 0.4em;">KINETIC TECHNOLOGY</span>
        <h1 class="display-kinetic text-white">SUPERA TUS LÍMITES</h1>
        <div class="d-flex flex-column flex-md-row gap-3 justify-content-center mt-5">
            <button class="btn btn-kinetic-primary">Explorar Hombre</button>
            <button class="btn btn-kinetic-outline">Explorar Mujer</button>
        </div>
    </div>
</section>
<!-- Promos -->
<section class="promo-section">
    <div class="container-fluid px-md-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="promo-card">
                    <img alt="Pro Collection" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEnZXn7KzImfLPftkuBEcZTH8sJtmqH5cpQUiPeU_FLG7P01h8KycL6TqEkscKZGvQfbhw7K_WGLAErgdfiiOJT7MaDfo2OMIkJdvvUiczBjfEbP5i70673uQ31CIMC2VIN3LEBkE5T0KANztD2D2yTyjDFSPKwut9zlf2KOD56apRfCtGzSAOPhKfMQCoGjGR_cjXdV1-xDLN8SoahtDOI7x1jYqwwJ11ooh6vhhSyA8mH7jTgYzlFGCX3wnZ4vcKpgY5ecTJaOY" />
                    <div class="promo-overlay"></div>
                    <div class="promo-content">
                        <span class="badge rounded-0 mb-3 label-caps py-2 px-3 text-dark bg-kinetic-yellow">SEASON PASS</span>
                        <h2 class="text-white mb-2">PRO-SERIES: -30%</h2>
                        <p class="text-secondary mb-4">Equipamiento técnico para el máximo rendimiento.</p>
                        <a class="text-kinetic-yellow label-caps text-decoration-none border-bottom border-warning" href="#">VER AHORA</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="promo-card">
                    <img alt="Summer Elite" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvF_y1SmJlzOretXBr_k-3CHR371xyavblvIlhDboKBQXanCXss7No2h9w9nIkwT-iv00jvbWbt_WkG9-JL0JQ10rWQjg6-lFWbR-f2fUqsUixRMao_TsgT9SQtw_-qwT9U-_uDFNsRiH3eRj1zat2LUw2bvJPEbuf-KJmn9mY_Wx6b7m4nIHK7Xjd85xOzZWV2dx6fk9k980KjoEAxTg-wbw8iodwxv_Lh2kdni7pW-n6XI3DuSM6QzgLBDGsGAPQN_Tb9BrLoHE" />
                    <div class="promo-overlay"></div>
                    <div class="promo-content">
                        <span class="badge rounded-0 mb-3 label-caps py-2 px-3 text-dark bg-kinetic-yellow">ELITE ACCESS</span>
                        <h2 class="text-white mb-2">OUTLET DE ACCESORIOS</h2>
                        <p class="text-secondary mb-4">Completa tu kit con tecnología de vanguardia.</p>
                        <a class="text-kinetic-yellow label-caps text-decoration-none border-bottom border-warning" href="#">DESCUBRIR</a>
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
            <!-- Card 1 -->
            <div class="col-sm-6 col-lg-3">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img alt="Leggings" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgBF0nmNz6WGy5Tm055nn0cMgSjWZmPTQAC5eAXxTJPehwWsN8fSmTlTKm0yehh2-41C7qqoTszJKbgCy5HHx1ejCAyqZrKPhr_KNY5bs8h5qwUZ7pSO85ncdgGT8POlEVCSLYdEDtE39Y1B2YNYlAYETyxtk3ukOm4rZCGT5emxTWqIKLqw4Eaoc-sF8IOs0npIMK6O3NdHJfGNukofJaM41hMfbSRrbEeIUQuK-hMhE9FVJh3edhdA_WScucZ2aopEx-NY_E2lI" />
                        <div class="position-absolute top-0 start-0 p-3 d-flex flex-column gap-2">
                            <span class="badge label-caps badge-new rounded-0">NEW</span>
                            <span class="badge label-caps badge-sale rounded-0">-20%</span>
                        </div>
                        <button class="btn btn-add-cart">AÑADIR AL CARRITO</button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="text-white fs-6 text-uppercase mb-1">Leggings Kinetic Compression</h3>
                            <span class="label-caps text-kinetic-yellow">S / M / L</span>
                        </div>
                        <div class="text-end">
                            <span class="text-secondary text-decoration-line-through d-block" style="font-size: 10px;">$120.00</span>
                            <span class="text-white fw-bold fs-5">$96.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-sm-6 col-lg-3">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img alt="Top" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3LoYc5D117to6CeFIEDhPi3jaqeUd8LrGji_uQvWdte2Gmq7FF1UzWydrmmHQ-ImbUyCS-EDR0W7Z0LGN5OfJNe2t3EPNkWebc1iT3LvWaaVR_xVE7D9iDpq5gxVIyp_TpXQCzBMKyFSGQvAr6MLpvQBjtDe6VRGoM5tfh7SMQXv2bJnDH8b6I37eTQBc1WaHirh6B9zO4r0CnL7DLc82sOT7DJE8eHCqekHwycEq0fK-Pd2pdNOjegjOOeu40oh3Ke5s9nX3kTg" />
                        <button class="btn btn-add-cart">AÑADIR AL CARRITO</button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="text-white fs-6 text-uppercase mb-1">Power Top Seamless</h3>
                            <span class="label-caps text-kinetic-yellow">XS / S / M</span>
                        </div>
                        <div class="text-end">
                            <span class="text-white fw-bold fs-5">$55.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-sm-6 col-lg-3">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img alt="Jacket" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA0_vRs_Vcxcr_lADCX_-Q-OBrKJIfEj54OckIO5G-1UCAVuvHHOvBDHmW24PaLM_VYIzBr9I0n-z6l9_eyA-Ck27oclr6E5ml8XDsqrLPwytuT0quYH9O1uxtFvpjG86JnxoFs4F3SPyga36ScxI3VwEj9UNgLAlQfHlMOS26kcX8VCBTWhB7XUW27cEhA9UuDbheAMlz1QDhMycMrVnKKr2B7N7QkobO0jENLIgrpwpNbfs9av5seR3XUCVzxeBiFlGirFm2MkPw" />
                        <div class="position-absolute top-0 start-0 p-3">
                            <span class="badge label-caps badge-new rounded-0">HOT</span>
                        </div>
                        <button class="btn btn-add-cart">AÑADIR AL CARRITO</button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="text-white fs-6 text-uppercase mb-1">Stormbreaker Pro Jacket</h3>
                            <span class="label-caps text-kinetic-yellow">M / L / XL</span>
                        </div>
                        <div class="text-end">
                            <span class="text-white fw-bold fs-5">$145.00</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="col-sm-6 col-lg-3">
                <div class="product-card">
                    <div class="product-img-wrapper">
                        <img alt="Gloves" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB02_L-IaJkfE1Y60B6Ro8sSg6JRAtSO0d3QmZaHAo2JdeJ42bET6emBanr25XnVgHBVSlGoWHzQuPdioXAgz0RDeuHSccQBstSX1Sk38peSfq6TQ9i1NRFVkoRmZK1Wuu34KYDiK6XMwlw8qau0qJbsM4A_BlRnfrKHnm8O01peSQJgRHhQMXyZZ2RXbrEVta4MXLAUblO12gD95iPbNnCftkhre6N8N02Komj9VnqPvvxifg6TZmZ-7tVYbho0sP13zFHVxr9zGA" />
                        <button class="btn btn-add-cart">AÑADIR AL CARRITO</button>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="text-white fs-6 text-uppercase mb-1">Elite Grip Gloves</h3>
                            <span class="label-caps text-kinetic-yellow">S / M</span>
                        </div>
                        <div class="text-end">
                            <span class="text-white fw-bold fs-5">$39.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Disciplines Bento -->
<section class="bento-section">
    <div class="container-fluid px-md-5">
        <h2 class="text-white display-5 mb-5">EXPLORA TU DISCIPLINA</h2>
        <div class="row g-4" style="min-height: 700px;">
            <div class="col-md-8">
                <div class="bento-item h-100">
                    <img alt="Mujer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYg-4RExbuddU7udvESBZVmafqhFp9UugfyYSVOnZKV4algoUievOeDkvhY9Z7LUFMKk9w8Pi98ttlz_peM-EerL7gVPctIf1dfianSaUR6fezGHxyLkU40TjIchSizeA5Vwy6KQbhsb0aEcpM4ZaztmT9IHuSUNhbOOnK2tAclFbHDfi7n3u2F8pk8fu2txMGFe87hww-GZ4WK2PiVlnso_Dakt8Om7mr1heZNaDQOaqNR6suAQLhacvavtL4LZdvmseHkd-NyWI" />
                    <div class="bento-overlay"></div>
                    <div class="bento-content">
                        <h3 class="display-3 text-white mb-4">MUJER</h3>
                        <a class="text-kinetic-yellow label-caps text-decoration-none d-flex align-items-center gap-2 group-link" href="#">
                            VER COLECCIÓN <i class="fa-solid fa-arrow-right transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex flex-column gap-4 h-100">
                    <div class="bento-item flex-grow-1">
                        <img alt="Hombre" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCOAXIzjtnR-RlvuN1n9RvVVL3HVM9cn3d0pSYgWSZUi2rRKgzETA42VIuUwxnzjfNusSZdOkMKhQFIntOh302P3vYW2ITcZtRi7F7_ZW_dTGFRaCXUvHPgVV9j9roapb-Yl9BK9Q3fBaYbsEByjpCKFzvjwHDZPBe3ci0G1aXOz257eP1Qb0fdLfkxeWenCgLmxMSTZtktL_TqdD9ve4_NwjKoaOCPcrayI2JHONLj43XEn2U3mYy67ZXsG-i9ySfXJPk--YqewwA" />
                        <div class="bento-overlay"></div>
                        <div class="bento-content p-4">
                            <h3 class="h2 text-white mb-2">HOMBRE</h3>
                            <a class="text-kinetic-yellow label-caps text-decoration-none d-flex align-items-center gap-2 group-link" href="#">
                                VER TODO <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bento-item flex-grow-1">
                        <img alt="Equipamiento" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCtw9NxjZlhg8ghTKgRZ1m-mf-feiPs2FT5_wxjdKSu9Ip_8PCmwRr6eYDWWYYPBBIX5e0lKfluDufN1bpy4beox1qTdsleea3JmANILEHcuM4VcWXBYUSeOIVlbhc3dOeFYd9nv73tce4aJIfg0I86gscVDExwsZn240ft4U4XUM-0u9PNJ8f9_fkx_I7jGHfYZY9SVILsst__e2oMZ8PnxCy3C9vAsctPimTmFhgVbAOoTdA0qErwFQiQOACSCsMMYwRb8QYrVZk" />
                        <div class="bento-overlay"></div>
                        <div class="bento-content p-4">
                            <h3 class="h2 text-white mb-2">EQUIPO</h3>
                            <a class="text-kinetic-yellow label-caps text-decoration-none d-flex align-items-center gap-2 group-link" href="#">
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

@endsection
