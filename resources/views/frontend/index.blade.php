@extends('layouts.frontend')

@section('main')
	<main class="container px-2 py-4 rounded-2 shadow bg-white custom-section">
		<div class="row">
			<div class="col-12 text-center">
				<h2 class="custom-text-shadow fs-3">SPECJALIZUJEMY SIĘ W SERWISOWANIU SAMOCHODÓW Z GRUPY VOLKSWAGEN</h2>
				<p class="custom-text-shadow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<a href="tel:{{ $company->phone }}" class="btn btn-sm btn-outline-primary py-0 shadow">Umów Wizytę</a>
			</div>
		</div>
	</main>
@endsection