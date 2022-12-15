<nav class="bg-custom-dark p-3">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <a href="/">
                <img src="{{ Storage::url('logo/white.png') }}" alt="">
            </a>
        </div>
        <div class="d-flex flex-column align-items-center text-center">
            <a href="tel:{{ $company->phone }}"
                class="text-custom-secondary text-decoration-none">{{ $company->phone }}</a>
            <p class="text-custom-secondary mb-0 lh-1 custom-font-size">
                {{ $company->city }} ul. {{ $company->street }} {{ $company->number }}
            </p>
        </div>
        <button type="button" class="hamburger-menu-open" data-bs-toggle="modal"
            data-bs-target="#navModal">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    <div class="bg-white p-2 my-5 rounded-1">
        <form method="POST" action="" class="d-flex justify-content-between">
            @csrf
            <input type="text" placeholder="Wpisz numer VIN" class="flex-fill border-0">
            <button class="btn btn-outline-primary py-0 shadow-sm">Szukaj</button>
        </form>
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
                            <a class="nav-link custom-text-shadow" href="#">O Nas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-text-shadow" href="#">Opinie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-text-shadow" href="#" tabindex="-1"
                                aria-disabled="true">Kontakt</a>
                        </li>
                    </ul>
                    <ul class="nav flex-column mt-3 custom-bg-image">

                        @foreach ($categories as $category)
                            <li class="nav-item text-center">
                                <a class="nav-link custom-text-shadow"
                                    href="{{ route('category.show', $category->id) }}">{{ $category->catName }}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
