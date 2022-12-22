<!-- Modal -->
<div class="modal modal-lg fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark p-3">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="row">
                    <h5 class="modal-title" id="contactModalLabel">Wypełnij formularz, jeden z naszych wykwalifikowanych
                        pracowników odpowie w przeciągu 24h roboczych.</h5>
                </div>
                <div class="row align-items-center py-md-5">
                    <div class="col-12 col-md-6 py-5 py-md-0">
                        <p class="mb-0">
                            <span class="fw-bold me-1">tel:</span>
                            {{ $company->phone }}
                        </p>
                        <p class="mb-0">
                            <span class="fw-bold me-1">email:</span>
                            {{ $company->email }}
                        </p>
                    </div>
                    <div class="col-0 col-md-6 text-center d-none d-md-block">
                        <p class="mb-0">{{ $company->post_code }} {{ $company->city }}</p>
                        <p class="mb-0">ul. {{ $company->street }} {{ $company->number }}</p>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <form action="">
                            <div class="form-floating mb-3 col-12 col-lg-6 mx-auto">
                                <input name="name" type="text" class="form-control" required id="floatingInputName"
                                    placeholder="Podaj swoje imię">
                                <label for="floatingInputName">Imię</label>
                            </div>
                            <div class="form-floating mb-3 col-12 col-lg-6 mx-auto">
                                <input name="email" type="email" class="form-control" required id="floatingInputEmail"
                                    placeholder="Podaj swój email">
                                <label for="floatingInputEmail">Email</label>
                            </div>
                            <div class="form-floating mb-3 col-12 col-lg-6 mx-auto">
                                <input name="phone" type="text" class="form-control" required id="floatingInputPhone"
                                    placeholder="Podaj numer telefonu">
                                <label for="floatingInputPhone">Telefon</label>
                            </div>
                            <div class="form-floating mb-3 col-12 col-lg-6 mx-auto">
                                <textarea class="form-control" style="min-height: 100px;" placeholder="Opisz problem z pojazdem" required id="floatingTextarea"></textarea>
                                <label for="floatingTextarea">Wiadomość</label>
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-sm btn-outline-primary py-0">Wyślij</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <h6>Zapraszamy do warsztatu!</h6>
            </div>
        </div>
    </div>
</div>
