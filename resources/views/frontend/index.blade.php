@extends('layouts.frontend')

@section('main')
    <main class="custom-negative-margin bg-white mb-5 mt-lg-5 rounded-1">
                
        <div id="mainCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item mb-5 p-3 active" data-bs-interval="4000">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-6 mx-auto custom-section">
                            <h2 class="custom-text-shadow fs-3 fw-bold mb-3">SPECJALIZUJEMY SIĘ W SERWISOWANIU SAMOCHODÓW Z GRUPY VOLKSWAGEN</h2>
                            <p class="custom-text-shadow">Jeśli szukasz specjalisty do serwisowania samochodów z grupy Volkswagen, to dobrze trafiłeś! Nasza firma specjalizuje się właśnie w naprawach tych pojazdów i posiada duże doświadczenie w tej dziedzinie. Dysponujemy wiedzą i sprzętem niezbędnym do wykonania profesjonalnych usług.</p>
                            <p class="custom-text-shadow"> Oferujemy szeroki zakres usług serwisowych, od wymiany oleju i filtrów po naprawy układów mechanicznych</p>
                            <p class="custom-text-shadow">Dbamy o zadowolenie naszych klientów i staramy się zapewnić im jak najlepsze usługi. Jeśli posiadasz samochód z grupy Volkswagen i szukasz rzetelnego mechanika, to zapraszamy do skorzystania z naszych usług.</p>
                            <button class="btn btn-sm btn-outline-primary py-0" data-bs-target="#contactModal"
                                data-bs-toggle="modal" data-bs-dismiss="modal">Umów Wizytę</button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5 p-3" data-bs-interval="4000">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-6 mx-auto">
                            <h2 class="custom-text-shadow fs-3 fw-bold mb-3">OFERUJEMY USŁUGI W ZAKRESIE TRANSPORTU SAMOCHODÓW NA LAWECIE</h2>
                            <p class="custom-text-shadow">Jeśli potrzebujesz transportu samochodu na lawecie, to mamy dla ciebie dobrą wiadomość! Nasza firma dysponuje nowoczesnymi lawetami, które są bezpieczne i wyposażone w specjalne zabezpieczenia.</p>
                            <p class="custom-text-shadow">Nasz zespół składa się z doświadczonych kierowców, którzy zapewnią bezpieczny transport twojego samochodu w każde miejsce.</p>
                            <p class="custom-text-shadow">Zadzwoń do nas lub skontaktuj się z nami poprzez formularz na naszej stronie internetowej. Chętnie doradzimy ci najlepsze rozwiązanie i udzielimy szczegółowych informacji na temat naszych usług. Nie zwlekaj, zadbaj o swój samochód już dziś!</p>
                            <button class="btn btn-sm btn-outline-primary py-0" data-bs-target="#contactModal"
                                data-bs-toggle="modal" data-bs-dismiss="modal">Umów Wizytę</button>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev d-none d-md-block" type="button" data-bs-target="#mainCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Poprzedni</span>
            </button>
            <button class="carousel-control-next d-none d-md-block" type="button" data-bs-target="#mainCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Następny</span>
            </button>
        </div>
    </main>

    <section id="service" class="container-fluid px-4 py-5 custom-section-image">
        <div class="row">
            <div class="col-12 col-lg-7 ms-lg-auto me-lg-5">
                <ul class="list-group list-group-flush rounded-2 shadow p-lg-5">

                    @foreach ($categories as $category)
                        <li class="list-group-item border-0 custom-text-shadow">
                            <p class="fs-5 mb-0">{{ $category->catName }}</p>
                            <p class="lh-1 mb-0">{{ $category->description }}</p>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>

    <article class="container-fluid py-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto text-center">
                <h3 class="fw-bold custom-text-shadow fs-1 mt-lg-5">Dlaczego MY?</h3>
                <ul class="list-group list-group-flush rounded-2 py-3">
                    <li class="list-group-item border-0 custom-text-shadow fs-5">
                        <span><img src="{{ Storage::url('shared/check.webp') }}" alt="check mark"></span>
                        Posiadamy duże doświadczenie w branży motoryzacyjnej i znamy się na naprawach samochodów 
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fs-5">
                        <span><img src="{{ Storage::url('shared/check.webp') }}" alt="check mark"></span>
                        Dysponujemy nowoczesnym warsztatem, w którym wykonujemy wszystkie naprawy i przeglądy.
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fs-5">
                        <span><img src="{{ Storage::url('shared/check.webp') }}" alt="check mark"></span>
                        Oferujemy szeroki zakres usług serwisowych, od wymiany oleju i filtrów po naprawy układów mechanicznych i elektrycznych.
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fs-5">
                        <span><img src="{{ Storage::url('shared/check.webp') }}" alt="check mark"></span>
                        Staramy się dobrać najlepsze rozwiązanie dla każdego samochodu i zapewnić naszym klientom fachowe doradztwo.
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fs-5">
                        <span><img src="{{ Storage::url('shared/check.webp') }}" alt="check mark"></span>
                        Cenimy sobie zadowolenie naszych klientów i dbamy o ich satysfakcję z świadczonych przez nas usług.
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fs-5">
                        <span><img src="{{ Storage::url('shared/check.webp') }}" alt="check mark"></span>
                        Zapewniamy szybkie i sprawne wykonanie napraw, aby nie tracić cennego czasu naszych klientów.
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fs-5">
                        <span><img src="{{ Storage::url('shared/check.webp') }}" alt="check mark"></span>
                        Zachęcamy do skorzystania z naszych usług i do zapoznania się z pełną ofertą na naszej stronie internetowej. Gwarantujemy rzetelność i profesjonalizm!
                    </li>
                </ul>
                <button class="btn btn-outline-primary mt-3" data-bs-target="#contactModal" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Umów Wizytę</button>
            </div>
        </div>
    </article>

    @include('frontend.partials.reviews')
@endsection
