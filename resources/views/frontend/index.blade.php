@extends('layouts.frontend')

@section('main')
    <main class="custom-negative-margin bg-white mb-5 mt-lg-5 rounded-1">
                
        <div id="mainCarousel" class="carousel carousel-dark slide shadow" data-bs-ride="carousel">
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
                            <h2 class="custom-text-shadow fs-3">SPECJALIZUJEMY SIĘ W SERWISOWANIU SAMOCHODÓW Z GRUPY VOLKSWAGEN</h2>
                            <p class="custom-text-shadow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                sunt
                                in culpa qui officia deserunt mollit anim id est laborum.</p>
                                <button class="btn btn-sm btn-outline-primary py-0" data-bs-target="#contactModal"
                                data-bs-toggle="modal" data-bs-dismiss="modal">Umów Wizytę</button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item mb-5 p-3" data-bs-interval="4000">
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-6 mx-auto">
                            <h2 class="custom-text-shadow fs-3">OFERUJEMY USŁUGI W ZAKRESIE TRANSPORTU SAMOCHODÓW NA LAWECIE</h2>
                            <p class="custom-text-shadow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
                                in culpa qui officia deserunt mollit anim id est laborum.</p>
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

    <section class="container-fluid px-4 py-5 custom-section-image">
        <div class="row">
            <div class="col-12 col-lg-7 ms-lg-auto me-lg-5">
                <ul class="list-group list-group-flush rounded-2 shadow p-lg-5">

                    @foreach ($categories as $category)
                        <li class="list-group-item border-0 custom-text-shadow">
                            <p class="fs-5 mb-0">{{ $category->catName }}</p>
                            <p class="lh-1 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet fugit,
                                est quam sit sapiente sequi praesentium accusamus.</p>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>

    <article class="container-fluid py-5 custom-article-bg">
        <div class="row">
            <div class="col-12 text-center fw-bold">
                <h3 class="fw-bold custom-text-shadow m-0">Dlaczego MY?</h3>
                <ul class="list-group list-group-flush rounded-2 py-3">
                    <li class="list-group-item border-0 custom-text-shadow fw-bold lh-1">
                        <span><img src="{{ Storage::url('shared/check.png') }}" alt="check mark"></span>
                        Doświadczeni mechanicy
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fw-bold lh-1">
                        <span><img src="{{ Storage::url('shared/check.png') }}" alt="check mark"></span>
                        Profesjonalne narzędzia
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fw-bold lh-1">
                        <span><img src="{{ Storage::url('shared/check.png') }}" alt="check mark"></span>
                        Specjalizacja w grupie VAG
                    </li>
                    <li class="list-group-item border-0 custom-text-shadow fw-bold lh-1">
                        <span><img src="{{ Storage::url('shared/check.png') }}" alt="check mark"></span>
                        Setki zadowolonych klientów
                    </li>
                </ul>
                <button class="btn btn-sm btn-outline-primary py-0" data-bs-target="#contactModal" data-bs-toggle="modal"
                    data-bs-dismiss="modal">Umów Wizytę</button>
            </div>
        </div>
    </article>

    @include('frontend.partials.reviews')
@endsection
