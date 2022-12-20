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
						<h1>Dodaj części serwisowe</h1>
						<p>Wpisz nazwę i cenę często używanych części serwisowych i korzystaj z nich podczas tworzenia nowego zlecenia.</p>

						@include('shared.success')

						<form method="POST" action="{{ route('part.store') }}" class="pt-5">
							@csrf
							<div class="input-group input-group-sm mb-3">
								<label for="InputName" class="input-group-text">Nazwa</label>
								<input value="{{ old('name') }}" name="name" type="text"
									class="form-control form-control-sm" id="InputName" aria-describedby="nameHelp">
								
								<input value="{{ old('price') }}" name="price" type="text"
								class="form-control form-control-sm" id="InputPrice" aria-describedby="nameHelp"
								style="max-width: 100px;">
								<label for="InputPrice" class="input-group-text">Cena</label>

							</div>
							<div class="mb-3">
								@include('shared.error', ['name' => 'proName'])
								@include('shared.error', ['name' => 'price'])
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