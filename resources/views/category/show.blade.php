@extends('layouts.frontend')

@section('main')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1>Usługi z kategorii: {{ $category->catName }}</h1>
            </div>
			<div class="col-12">
				<ol class="list-group list-group-flush">

					@foreach ($category->products as $product)
					<li class="list-group-item d-flex justify-content-between">
						<p>{{ $product->proName }}</p>
						<p>{{ $product->price }} zł</p>
					</li>
					@endforeach

				</ol>
			</div>
        </div>
    </div>
@endsection
