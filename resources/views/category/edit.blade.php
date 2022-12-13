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
                            <h1 class="fs-2">
								Edytuj Kategorię:
								<span class="fw-bold ms-3">
									{{ $category->catName }}
								</span>
							</h1>
							<div>

								@if (session('success'))
									<p id="confirmation" class="text-success">{{ session('success') }}</p>
								@endif
				
								<form method="POST" action="{{ route('category.update', $category->id) }}" class="pt-5">
									@csrf
									@method('PUT')
									<div class="row g-3 align-items-center mb-3">
										<div class="col-12 col-md-9 input-group">
											<label for="InputCategory" class="input-group-text">Nazwa Kategorii</label>
											<input value="{{ old('catName') ? old('catName') : $category->catName}}" name="catName" type="text"
												class="form-control form-control-sm" id="InputCategory" aria-describedby="nameHelp">
											<button type="submit" class="btn btn-success">Zapisz</button>
										</div>
									</div>
								</form>

								@include('shared.error', ['name' => 'catName'])

							</div>
							<div class="pt-5">
								@if (!$category->products->isEmpty())
								<h2 class="fs-4">Usługi w tej kategorii</h2>
								<ul class="list-group list-group-flush">
									@foreach ($category->products as $product)
										<li class="list-group-item d-flex justify-content-between">
											<p class="d-flex justify-content-between flex-fill pe-5">
												<span>{{ $product->proName }}</span>
												<span>{{ number_format($product->price / 100, 2) }} zł</span>
											</p>
											<form method="POST" action="{{ route('product.destroy', $product->id) }}">
												@csrf
												@method('DELETE')
												<button class="btn btn-sm btn-outline-danger py-0">Usuń</button>
											</form>
										</li>
									@endforeach
								</ul>
								@else
								<div>
									<p>Brak usług w tej kategorii</p>
									<a class="btn btn-sm btn-outline-success py-0" href="{{ route('product.create', $category->id) }}">Dodaj Usługę</a>
								</div>
								@endif
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
