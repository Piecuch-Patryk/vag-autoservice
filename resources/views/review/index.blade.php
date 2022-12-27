@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row align-items-center">
		<div class="col-12 col-md-10 mx-auto mb-3">
			<h1>Opinie Klientów</h1>

			@include('shared.success')

			@if (count($reviews) > 1)
				<ul class="list-group rounded-0">

					@foreach ($reviews as $review)
						<li class="list-group-item text-center mb-3">
							<div class="d-flex flex-column flex-lg-row justify-content-between">
								{{ $review->name }}
								@include('frontend.partials.rated')
							</div>
							<div class="text-lg-start">
								<p>
									{{ $review->content }}
								</p>
							</div>
							<div class="text-lg-start">
								<form method="POST" action="{{ route('review.delete', $review->id) }}">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-outline-danger py-0">Usuń</button>
								</form>
							</div>
						</li>
					@endforeach

				</ul>
			@else
				<p>Brak opinii klientów.</p>
			@endif

		</div>
	</div>
</div>
@endsection
