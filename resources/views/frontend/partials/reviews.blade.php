<section id="reviews" class="container mb-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h3 class="custom-text-shadow fw-bold mb-0">Opinie Naszych Klientów</h3>
        </div>
    </div>

    @if (count($reviews) > 0)
        <div class="row">
            @foreach ($reviews as $review)
                <div class="col-12 custom-text-shadow mb-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="py-1">
                            <h5 class="fw-bold lh-1 mb-0">
                                {{ $review->name }}
                            </h5>
                            <p class="mb-0 mt-2 lh-1 custom-fs-8">{{ $review->created_at->format('Y/m/d') }}</p>
                        </div>
                        
                        @include('frontend.partials.rated')

                    </div>
                    <div>
                        <p>{{ $review->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="row">
            <div class="col-12 text-center">
                <p>Bądź pierwszy i dodaj swoją opinię!</p>
            </div>
        </div>
    @endif

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
                    <h5 class="modal-title text-center mb-5 lh-1" id="reviewFormModalLabel">Twoja opinia ma dla nas
                        znaczenie!</h5>
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
                            <textarea class="form-control" name="content" placeholder="Leave a comment here" id="textarea" style="height: 100px"
                                required></textarea>
                            <label for="textarea">Twoja opinia</label>
                            <div class="invalid-feedback">
                                Proszę wpisać opninię
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="feedback">

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
