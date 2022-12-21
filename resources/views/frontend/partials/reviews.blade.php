<section id="reviews" class="container-fluid mb-5">
    <div class="row align-items-center">
        <div class="d-none d-md-flex col-0 col-md-3 col-lg-4">
            <img src="{{ Storage::url('shared/reviews.png') }}" class="w-100" alt="{{ $company->name }} logo">
        </div>
        <div class="col-12 col-md-9 col-lg-8">
            <h3 class="custom-text-shadow fw-bold my-5 text-center">Opinie Naszych Klientów</h3>

                @if (count($reviews) > 0)
                <div class="glide">
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
                @else
                <div class="row">
                    <div class="col-12 text-center">
                        <p>Bądź pierwszy i dodaj swoją opinię!</p>
                    </div>
                </div>
                @endif
            <div class="row my-3">
                <div class="col-12 text-center">
                    <button type="button" class="btn btn-sm btn-outline-primary py-0 shadow" data-bs-toggle="modal"
                        data-bs-target="#reviewFormModal">
                        Dodaj Opinię
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal - add review --}}
    <div class="modal fade" id="reviewFormModal" tabindex="-1" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title text-center mb-5 lh-1" id="reviewFormModalLabel">Twoja opinia ma dla nas
                        znaczenie!</h5>
                    <p class="text-center">
                        <small>Nigdy nie udostępniamy adresów email podmiotom trzecim.</small>
                    </p>
                    <form method="POST" action="{{ route('review.store') }}" class="needs-validation">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                required>
                            <label for="email">Email</label>
                            <div class="invalid-feedback">
                                Proszę podać email
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Imię"
                                required>
                            <label for="name">Imię</label>
                            <div class="invalid-feedback">
                                Proszę podać imię
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="content" placeholder="Leave a comment here" id="textarea"
                                style="height: 100px" required></textarea>
                            <label for="textarea">Twoja opinia</label>
                            <div class="invalid-feedback">
                                Proszę wpisać opninię
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="feedback mx-auto">
    
                                @include('frontend.partials.rating')
    
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-outline-success py-0">Wyślij</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
