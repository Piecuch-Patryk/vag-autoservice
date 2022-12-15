<header class="container custom-header-bg pb-5 text-white">

    @if (session('success_form_sent'))
    <div id="alert" class="row visible">
        <div class="col-12">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    <h4 class="alert-heading">Dziękujemy!</h4>
                    <p class="mb-0">Twoja opinia została wysłana.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row pb-5">
        <div class="col-12 pb-5">
            <h1>Pełna historia serwisowa on-line!</h1>
            <p>Dostęp do pełnej histori serwisowej Twojego samochodu. Wpisz numer VIN w wyszukiwarkę i przeglądaj historię napraw.</p>
            <button class="btn custom-btn-outline-primary py-0 text-white border-1">Więcej</button>
        </div>
    </div>
</header>