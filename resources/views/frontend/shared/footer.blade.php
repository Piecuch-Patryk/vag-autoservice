<div class="container">
    <div class="row align-items-center">
        <div class="col-6">
            <img src="{{ Storage::url('logo/black-lg.png') }}" class="w-100" alt="{{ $company->name }} logo">
        </div>
        <div class="col-6 text-center">
            <div class="py-1">
				<h5 class="fs-6 mb-0">Lokalizacja</h5>
				<p class="mb-0 lh-1 custom-fs-8 custom-text-shadow">{{ $company->post_code }}</p>
				<p class="mb-0 lh-1 custom-fs-8 custom-text-shadow">{{ $company->city }}</p>
				<p class="mb-0 lh-1 custom-fs-8 custom-text-shadow">{{ $company->street }} {{ $company->number }}</p>
			</div>
			<div class="py-1 d-flex flex-column">
				<h5 class="fs-6 mb-0">Kontakt</h5>
				<a href="tel:{{ $company->phone }}" class="mb-0 lh-1 custom-fs-8 custom-text-shadow text-decoration-none text-dark">{{ $company->phone }}</a>
			</div>
        </div>
    </div>
	<div class="row mt-5">
		<div class="col-12 text-center">
			<p class="custom-fs-8 custom-text-shadow text-muted mb-0">Design&Dev @ Patryk Piecuch <a href="https://devpat.online" class="text-muted" target="_blank" rel="noopener noreferrer">devpat.online</a></p>
		</div>
	</div>
</div>
