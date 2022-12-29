<div class="modal modal-xl fade" id="aboutUs" tabindex="-1" aria-labelledby="aboutUsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark p-3 custom-modal-about text-center text-md-start">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body row align-items-center">
                <h5 class="fw-bold mb-3">Poznajmy się - kilka słów o nas</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                    pariatur.</p>
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
