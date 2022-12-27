@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<h1>Edytuj: {{ $part->name }}</h1>

		@include('shared.success')

		<form method="POST" action="{{ route('part.update', $part->id) }}" class="pt-5">
			@csrf
			@method('PUT')
			<div class="input-group input-group-sm mb-3">
				<label for="InputName" class="input-group-text">Nazwa</label>
				<input value="{{ old('name') ? old('name') : $part->name }}" name="name" type="text"
					class="form-control form-control-sm" id="InputName" aria-describedby="nameHelp">

				<input value="{{ old('price') ? old('price') : number_format($part->price / 100, 2) }}"
					name="price" type="text" class="form-control form-control-sm" id="InputPrice"
					aria-describedby="nameHelp" style="max-width: 100px;">
				<label for="InputPrice" class="input-group-text">Cena</label>

			</div>
			<div class="mb-3">
				@include('shared.error', ['name' => 'name'])
				@include('shared.error', ['name' => 'price'])
			</div>
			<div class="text-center text-lg-start">
				<button type="submit" class="btn btn-outline-info">Zapisz</button>
			</div>
		</form>
	</div>
</div>
@endsection
