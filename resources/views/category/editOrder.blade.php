@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-10 mx-auto mb-3">
                <h1>Edytuj kolejność kategorii</h1>
				<p>W łatwy sposób edytuj kolejność wyświetlanych kategorii. Złap element i upuść w wybranym miejscu, następnie kliknij zapisz.</p>

				<div>
					<form method="POST" action="{{ route('category.updateOrder') }}">
						<ul class="list-group rounded-0">

							@foreach ($categories as $category)
							<li class="list-group-item mb-1 shadow-sm">
								<input type="text" readonly hidden name="id" value="{{ $category->id }}">
								<input type="text" readonly hidden name="order" value="{{ $category->order }}">
								<h5 class="fw-bold">{{ $category->catName }}</h5>
							</li>
							@endforeach

						</ul>
					</form>
				</div>

            </div>
        </div>
    </div>
@endsection
