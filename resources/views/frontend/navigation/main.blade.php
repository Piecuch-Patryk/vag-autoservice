<nav class="bg-custom-dark p-3">
    <div class="d-flex justify-content-between align-items-center p-xl-5 mx-xl-5 fixed-top p-3 bg-black custom-fixed-to-relative">
        <div>
            <a href="/">
                <img class="d-lg-none" src="{{ Storage::url('logo/white.png') }}" alt="">
                <img class="d-none d-lg-block" src="{{ Storage::url('logo/white-lg.png') }}" alt="">
            </a>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center text-center d-lg-none">
            <a href="tel:{{ $company->phone }}"
                class="text-custom-secondary text-decoration-none">{{ $company->phone }}</a>
            <p class="text-custom-secondary mb-0 lh-1 custom-font-size">
                {{ $company->city }} ul. {{ $company->street }} {{ $company->number }}
            </p>
        </div>
        <button type="button" class="hamburger-menu-open d-lg-none" data-bs-toggle="modal" data-bs-target="#navModal" aria-label="toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="d-none d-lg-flex flex-column">
            <div class="text-end mb-3">
                <a href="tel:{{ $company->phone }}"
                    class="text-custom-secondary text-decoration-none mx-4">{{ $company->phone }}</a>
                <p class="text-custom-secondary d-inline mx-4">
                    {{ $company->city }} ul. {{ $company->street }} {{ $company->number }}
                </p>
            </div>
            <div>

                <div class="bg-white p-2 rounded-1 w-75 ms-auto me-4 mb-3">
                    @include('frontend.shared.searchForm')
                </div>

                <div class="d-none d-lg-flex justify-content-end me-4">
                    @include('frontend.shared.searchFormFailure')
                </div>

            </div>
            <nav>
                <ul class="nav justify-content-around">
                    <li class="nav-item mx-lg-1 mx-xxl-5">
                        <a class="nav-link text-light fs-5" href="#service" role="button" >Serwis</a>
                    </li>
                    <li class="nav-item mx-lg-1 mx-xxl-5">
                        <a class="nav-link text-light fs-5" href="#" tabindex="-1" aria-disabled="true"
                            data-bs-toggle="modal" data-bs-target="#rescueModal">Pomoc Drogowa</a>
                    </li>
                    <li class="nav-item mx-lg-1 mx-xxl-5">
                        <a class="nav-link text-light fs-5" href="#" tabindex="-1" aria-disabled="true"
                            data-bs-toggle="modal" data-bs-target="#aboutUs">O Nas</a>
                    </li>
                    <li class="nav-item mx-lg-1 mx-xxl-5">
                        <a class="nav-link text-light fs-5" href="#reviews">Opinie</a>
                    </li>
                    <li class="nav-item ms-lg-1 ms-xxl-5 me-3">
                        <a class="nav-link text-light fs-5" href="#" tabindex="-1" aria-disabled="true"
                            data-bs-toggle="modal" data-bs-target="#contactModal">Kontakt</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="d-lg-none">
        <br/>
        <div class="bg-white p-2 my-5 rounded-1">
            @include('frontend.shared.searchForm')
        </div>
    </div>

    <div class="d-lg-none text-center">
        @include('frontend.shared.searchFormFailure')
    </div>

    <div class="modal fade" id="navModal" tabindex="-1" aria-labelledby="navModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div>
                        <img src="{{ Storage::url('logo/black.png') }}" alt="">
                    </div>
                    <div class="d-flex flex-column align-items-center text-center flex-fill">
                        <a href="tel:{{ $company->phone }}"
                            class="text-custom-secondary text-decoration-none custom-text-shadow">{{ $company->phone }}</a>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav justify-content-around mt-3 border-bottom">
                        <li class="nav-item">
                            <a class="nav-link custom-text-shadow" href="#" tabindex="-1" aria-disabled="true"
                            data-bs-toggle="modal" data-bs-target="#rescueModal">Pomoc Drogowa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-text-shadow" href="#" tabindex="-1" aria-disabled="true"
                                data-bs-toggle="modal" data-bs-target="#aboutUs">O Nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-text-shadow" href="" data-custom-scroll="#reviews">Opinie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-text-shadow" href="#" tabindex="-1" aria-disabled="true"
                                data-bs-toggle="modal" data-bs-target="#contactModal">Kontakt</a>
                        </li>
                    </ul>
                    <ul class="nav flex-column mt-3 custom-bg-image">
                        <li class="nav-item text-center">
                            <a class="nav-link custom-text-shadow"
                                href="" data-custom-scroll="#service">Usługi Serwisowe</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
