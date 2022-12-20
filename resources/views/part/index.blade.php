@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-0 col-lg-2">
                <nav class="nav d-none d-lg-flex flex-column sticky-top top-25">
                    @include('navs.nav')
                </nav>
            </div>
            <div class="col-12 col-lg-10">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-10 mx-auto mb-3">
                            <h1>Lista części serwisowych</h1>
							
							@include('shared.success')
							
							@if (count($parts) > 1)
							<ul class="list-group rounded-0">

							@foreach ($parts as $part)
								<li class="list-group-item text-center mb-3">
									<div class="d-flex flex-column flex-lg-row justify-content-between">
										<p>{{ $part->name }}</p>
										<span>{{ number_format($part->price / 100, 2) }} zł</span>
									</div>
									<div class="d-flex align-items-center justify-content-around">
										<a href="{{ route('part.edit', $part->id) }}" class="btn btn-sm btn-outline-info py-0">Edytuj</a>
										<form method="POST" action="{{ route('part.delete', $part->id) }}" class="d-flex">
											@csrf
											@method('DELETE')
											<button class="btn btn-sm btn-outline-danger py-0">Usuń</button>
										</form>
									</div>
								</li>
							@endforeach
							
							</ul>
							@else
							<p>Brak części serwisowych.</p>
							@endif

						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection