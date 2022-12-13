@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-0 col-lg-3">
                <nav class="nav d-none d-lg-flex flex-column">
                    @include('navs.nav')
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <div class="container-fluid">
                    <div class="row">
						<h1>Edytuj produkt</h1>

						@include('shared.success')

						<form method="POST" action="{{ route('product.update', $product->id) }}" class="pt-5">
							@csrf
							@method('PUT')
							<div class="input-group input-group-sm mb-3">
								<label for="InputName" class="input-group-text">Nazwa</label>
								<input value="{{ old('proName') ? old('proName') : $product->proName }}" name="proName" type="text"
									class="form-control form-control-sm" id="InputName" aria-describedby="nameHelp">
								
								<input value="{{ old('price') ? number_format(old('price') / 100, 2) : number_format($product->price / 100, 2) }}" name="price" type="text"
								class="form-control form-control-sm" id="InputPrice" aria-describedby="nameHelp"
								style="max-width: 100px;">
								<label for="InputPrice" class="input-group-text">Cena</label>

							</div>
							<div class="mb-3">
								@include('shared.error', ['name' => 'proName'])
								@include('shared.error', ['name' => 'price'])
							</div>
							<div class="input-group input-group-sm mb-3">
								<label class="input-group-text" for="categorySelect">Kategoria</label>
								<select name="category_id" class="form-select" id="categorySelect">

									@foreach ($categories as $category)
									<option
										{{ ($product->category_id == $category->id || old('category_id') == $category->id) ? 'selected' : '' }}
										value="{{ $category->id }}">{{ $category->catName }}
									</option>
									@endforeach

								</select>
							  </div>
							  <div class="mb-3">
								@include('shared.error', ['name' => 'category_id'])
							</div>
							<div class="text-center text-lg-start">
								<button type="submit" class="btn btn-outline-info">Zapisz</button>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection