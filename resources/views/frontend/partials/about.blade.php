<div class="modal modal-xl fade" id="aboutUs" tabindex="-1" aria-labelledby="aboutUsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark p-3 custom-modal-about text-center text-md-start">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row align-items-center">
                <h5 class="fw-bold mb-3">Poznajmy się - kilka słów o nas</h5>
                <p>Jeśli szukasz profesjonalnego mechanika samochodowego, to dobrze trafiłeś! Nasza firma zajmuje się naprawami samochodów osobowych i dostawczych wszystkich marek. Dysponujemy nowoczesnym warsztatem, w którym nasz wykwalifikowany personel wykonuje wszystkie naprawy i przeglądy. Oferujemy także wymianę oleju i filtrów oraz inne usługi związane z utrzymaniem samochodu w dobrym stanie technicznym.</p>
                <p>Nasza kadra składa się z doświadczonych mechaników samochodowych, którzy stale podnoszą swoje kwalifikacje i znają najnowsze technologie stosowane w branży motoryzacyjnej. Dzięki temu jesteśmy w stanie zapewnić naszym klientom najwyższy poziom usług i fachowe doradztwo.</p>
                <p>Nasza firma ceni sobie zadowolenie klientów, dlatego też do każdego zlecenia podchodzimy indywidualnie i staramy się dobrać najlepsze rozwiązanie dla każdego samochodu. Zachęcamy do skorzystania z naszych usług i do zapoznania się z pełną ofertą na naszej stronie internetowej.</p>
                <div class="text-center text-lg-start mb-5">
                    <button class="btn btn-sm btn-outline-primary py-0" data-bs-target="#contactModal"
                        data-bs-toggle="modal" data-bs-dismiss="modal">Umów Wizytę</button>
                </div>

                @if (count($reviews) > 0)
                    <div>
                        <h5 class="fw-bold mb-5">Opinie Naszych Klientów</h5>
                    </div>
                    <div class="glide_about">
                        <div class="glide__track" data-glide-el="track">
                            <ul class="glide__slides">

                                @foreach ($reviews as $review)
                                    <li class="glide__slide">
                                        <div class="d-flex justify-content-center">
                                            @include('frontend.partials.rated')
                                        </div>
                                        <div class="d-flex justify-content-center ps-1">
                                            <div class="text-center">
                                                <h6>{{ $review->name }}</h6>
                                                <p class="mb-0 lh-1">
                                                    <small>
                                                        {{ $review->created_at->format('Y/m/d') }}
                                                    </small>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="ps-1 text-center">{{ $review->content }}</p>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
				@endif
            </div>
        </div>
    </div>
</div>
