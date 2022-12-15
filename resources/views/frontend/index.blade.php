@extends('layouts.frontend')

@section('main')
    <main class="container px-2">
        <div class="row mb-5 py-5 rounded-2 shadow bg-white custom-section">
            <div class="col-12 text-center">
                <h2 class="custom-text-shadow fs-3">SPECJALIZUJEMY SIĘ W SERWISOWANIU SAMOCHODÓW Z GRUPY VOLKSWAGEN</h2>
                <p class="custom-text-shadow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
                    in culpa qui officia deserunt mollit anim id est laborum.</p>
                <a href="tel:{{ $company->phone }}" class="btn btn-sm btn-outline-primary py-0 shadow">Umów Wizytę</a>
            </div>
        </div>
    </main>

    <section class="container px-4 py-5 custom-section-image">
        <div class="row">
            <div class="col-12">
                <ul class="list-group list-group-flush rounded-2 shadow">

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

    <section class="container pt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="custom-text-shadow">Opinie Naszych Klientów</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-sm btn-outline-primary py-0 shadow" data-bs-toggle="modal"
                    data-bs-target="#reviewFormModal">
                    Dodaj Opinię
                </button>
            </div>
        </div>
        <div class="modal fade" id="reviewFormModal" tabindex="-1" aria-labelledby="reviewFormModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-title text-center mb-3 lh-1" id="reviewFormModalLabel">Twoja opinia ma dla nas znaczenie!</h5>
                        <form methog="POST" action="">
                            <input type="email" placeholder="email">
                            <input type="text" placeholder="imię">
                            <textarea name="" id="" cols="30" rows="10">Twoja opinia...</textarea>
                            <div class="text-center">
                                <button class="btn btn-sm btn-outline-success py-0">Wyślij</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <article class="container py-5 custom-article-bg">
        <div class="row">
            <div class="col-12 text-center">
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
                <a href="tel:{{ $company->phone }}" class="btn btn-sm btn-outline-primary py-0 shadow">Umów Wizytę</a>
            </div>
        </div>
    </article>
@endsection
