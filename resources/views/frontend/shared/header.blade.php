<header class="container-fluid custom-header-bg pb-5 text-white">

    @if (session('success_form_sent'))
    <div id="alert" class="row visible">
        <div class="col-12 col-lg-6 mx-lg-auto">
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

    @if (!session('success_email_sent'))
    <div id="alert" class="row visible">
        <div class="col-12 col-lg-6 mx-lg-auto">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    <h4 class="alert-heading">Dziękujemy!</h4>
                    <p class="mb-0">Twoja wiadomość została wysłana.</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row pb-5">
        <div class="col-12 pb-5 col-md-10 col-lg-5 mt-md-5 p-lg-5 pe-lg-0">
            <h1>Pełna historia serwisowa on-line!</h1>
            <p>Dostęp do pełnej historii serwisowej Twojego samochodu. Wpisz numer VIN w wyszukiwarkę i przeglądaj historię napraw.</p>
            <p>Oferujemy szeroki zakres usług serwisowych, od wymiany oleju i filtrów po naprawy układów mechanicznych i elektrycznych.</p>
            <button class="btn custom-btn-outline-primary py-0 text-white border-1" data-bs-toggle="modal" data-bs-target="#headerMore">Więcej</button>
        </div>
    </div>

    @include('frontend.partials.contact')
    @include('frontend.partials.header_more')
    @include('frontend.partials.about')
</header>