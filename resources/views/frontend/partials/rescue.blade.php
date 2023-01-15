<!-- Modal -->
<div class="modal modal-lg fade" id="rescueModal" tabindex="-1" aria-labelledby="rescueModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-dark p-3">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="row">
                    <h5 class="modal-title" id="rescueModalLabel">Potrzebujesz lawety? Dobrze trafiłeś, specjalizujemy się w transporcie pojazdów do 3.5t </h5>
					<p>Dostarczenie unieruchomionych pojazdów do warsztatu w celu naprawy, przewóz samochodów wystawowych, zabytkowych, wyścigowych oraz specjalnych.</p>
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
            </div>
            <div class="modal-footer justify-content-center">
                <h6>Chętnie pomożemy!</h6>
            </div>
        </div>
    </div>
</div>