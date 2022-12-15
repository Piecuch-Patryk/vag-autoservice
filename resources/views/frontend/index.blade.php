@extends('layouts.frontend')

@section('main')
	<main class="container px-2">
		<div class="row mb-5 py-5 rounded-2 shadow bg-white custom-section">
			<div class="col-12 text-center">
				<h2 class="custom-text-shadow fs-3">SPECJALIZUJEMY SIĘ W SERWISOWANIU SAMOCHODÓW Z GRUPY VOLKSWAGEN</h2>
				<p class="custom-text-shadow">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				<a href="tel:{{ $company->phone }}" class="btn btn-sm btn-outline-primary py-0 shadow">Umów Wizytę</a>
			</div>
		</div>
	</main>
	
	<section class="container px-4 py-5 custom-section-image">
		<div class="row">
			<div class="col-12">
				<ul class="list-group list-group-flush rounded-2 shadow">

					@foreach ($categories as $category)
					<li class="list-group-item border-0 custom-text-shadow">
						<p class="fs-5 mb-0">{{ $category->catName }}</p>
						<p class="lh-1 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui eveniet fugit, est quam sit sapiente sequi praesentium accusamus.</p>
					</li>
					@endforeach

				</ul>
			</div>
		</div>
	</section>
@endsection