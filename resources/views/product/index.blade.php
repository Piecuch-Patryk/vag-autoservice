@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row align-items-center">
		<div class="col-12 col-md-10 mx-auto mb-3">
			<h1>Uslugi</h1>
			<div class="mb-3">
				<a class="btn btn-sm btn-outline-success" href="{{ route('product.create', 0) }}">Dodaj
					Usługę</a>
			</div>

			@include('shared.success')

			<ul class="list-group">

				@foreach ($products as $product)
					<li class="list-group-item text-center">
						<div class="d-flex justify-content-between">
							<p class="mb-0">{{ $product->proName }}</p>
							<p class="mb-0">{{ number_format($product->price / 100, 2) }} zł</p>
						</div>
						<div class="d-flex justify-content-between">
							<p class="mb-0">
								Kategoria:
								<span class="fw-bold">{{ $product->category->catName }}</span>
							</p>
							<div class="d-flex align-items-center">
								<a class="btn btn-sm btn-outline-info py-0 mx-3"
									href="{{ route('product.edit', $product->id) }}">Edytuj</a>
								<form method="POST" action="{{ route('product.destroy', $product->id) }}"
									class="d-flex align-items-center">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-outline-danger py-0 mx-3">Usuń</button>
								</form>
							</div>
						</div>
					</li>
				@endforeach

			</ul>

		</div>
	</div>
</div>
@endsection
