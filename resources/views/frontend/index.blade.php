@extends('layouts.frontend')

@section('main')
    <main class="container-fluid px-2">
        <div class="row mb-5 py-5 rounded-2 shadow bg-white custom-section mt-md-5">
            <div class="col-12 col-lg-8 mx-lg-auto text-center">
                <h2 class="custom-text-shadow fs-3">SPECJALIZUJEMY SIĘ W SERWISOWANIU SAMOCHODÓW Z GRUPY VOLKSWAGEN</h2>
                <p class="custom-text-shadow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                    in culpa qui officia deserunt mollit anim id est laborum.</p>
                <button class="btn btn-sm btn-outline-primary py-0" data-bs-target="#contactModal" data-bs-toggle="modal" data-bs-dismiss="modal">Umów Wizytę</button>
            </div>
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
                <button class="btn btn-sm btn-outline-primary py-0" data-bs-target="#contactModal" data-bs-toggle="modal" data-bs-dismiss="modal">Umów Wizytę</button>
            </div>
        </div>
    </article>

    @include('frontend.partials.reviews')
    
@endsection
