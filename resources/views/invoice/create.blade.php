@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-0 col-lg-3">
            <nav class="nav d-none d-lg-flex flex-column">
                @include('navs.nav')
            </nav>
        </div>
        <div class="col-12 col-lg-9">
            <div class="container-fluid">
                <div class="row">
                    <h1>Formularz Naprawy</h1>
                    <p>Stwórz formularz naprawy w łatwy i przyjemny sposób.</p>

                    @if(session('success'))
                    <p id="confirmation" class="text-success">{{ session('success') }}</p>
                    @endif

                    <form method="POST" action="" class="pt-5">
                        @csrf
                        <div class="input-group mb-3">
                            <label for="InputNumber" class="input-group-text">Numer Dokumentu</label>
                            <input value="{{ $invoiceNumber++ }}" readonly name="number" type="text" class="form-control" id="InputNumber">
                        </div>
                        <div class="input-group mb-3">
                            <label for="InputMake" class="input-group-text">Marka Pojazdu</label>
                            <input value="{{ old('make') }}" name="make" type="text" class="form-control" id="InputMake">

                        </div>

						@if ($errors->first('make'))
						<div>
							<span class="text-danger fw-bold">
								{{ $errors->first('make') }}
							</span>
						</div>
						@endif

                        <div class="input-group mb-3">
                            <label for="InputModel" class="input-group-text">Model Pojazdu</label>
                            <input value="{{ old('model') }}" name="model" type="text" class="form-control" id="InputModel">
                        </div>

						@if ($errors->first('model'))
						<div>
							<span class="text-danger fw-bold">
								{{ $errors->first('model') }}
							</span>
						</div>
						@endif
							
                        <div class="input-group mb-3">
                            <label for="InputRegistration" class="input-group-text">Numer Rejestracyjny</label>
                            <input value="{{ old('registration') }}" name="registration" type="text" class="form-control" id="InputRegistration">
                        </div>

						@if ($errors->first('registration'))
						<div>
							<span class="text-danger fw-bold">
								{{ $errors->first('registration') }}
							</span>
						</div>
						@endif

                        <div class="input-group mb-3">
                            <label for="InputVin" class="input-group-text">Numer VIN</label>
                            <input value="{{ old('vin') }}" name="vin" type="text" class="form-control" id="InputVin">
                        </div>

						
						@if ($errors->first('vin'))
						<div>
							<span class="text-danger fw-bold">
								{{ $errors->first('vin') }}
							</span>
						</div>
						@endif

                        <div class="input-group mb-3">
                            <label for="InputMilage" class="input-group-text">Przebieg</label>
                            <input value="{{ old('milage') }}" name="milage" type="number" class="form-control" id="InputMilage">

                        </div>

						@if ($errors->first('milage'))
						<div>
							<span class="text-danger fw-bold">
								{{ $errors->first('milage') }}
							</span>
						</div>
						@endif

                        <h3>Wykonane Czynności</h3>
                        <div class="row">
                            <div class="col-7 px-0 ps-1 px-lg-3 col-lg-10 mb-3">
								<div class="input-group">
									<label for="InputJobDesc" class="input-group-text">Opis</label>
									<input value="{{ old('jobDesc') }}" name="jobDesc" type="text" class="form-control" id="InputPartDesc">
								</div>
								
								@if ($errors->first('jobDesc'))
								<span class="text-danger fw-bold">
									{{ $errors->first('jobDesc') }}
								</span>
								@endif
                            </div>
							<div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
								<div class="input-group">
									<label for="InputJobPrice" class="input-group-text">Cena</label>
									<input value="{{ old('jobPrice') }}" name="jobPrice" type="number" class="form-control" id="InputPartDesc">
								</div>
									
								@if ($errors->first('jobPrice'))
								<span class="text-danger fw-bold">
									{{ $errors->first('jobPrice') }}
								</span>
								@endif
							</div>
                        </div>
                        <h3>Lista Części</h3>
                        <div class="row">
							<div class="col-7 px-0 ps-1 px-lg-3 col-lg-10 mb-3">
								<div class="input-group">
									<label for="InputPartDesc" class="input-group-text">Opis</label>
									<input value="{{ old('partDesc') }}" name="partDesc" type="number" class="form-control" id="InputPartDesc">
								</div>
								
								@if ($errors->first('partDesc'))
								<span class="text-danger fw-bold">
									{{ $errors->first('partDesc') }}
								</span>
								@endif
							</div>

							<div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
								<div class="input-group">
									<label for="InputPartPrice" class="input-group-text">Cena</label>
									<input value="{{ old('PartPrice') }}" name="PartPrice" type="number" class="form-control" id="InputPartPrice">
								</div>

								@if ($errors->first('PartPrice'))
								<span class="text-danger fw-bold">
									{{ $errors->first('PartPrice') }}
								</span>
								@endif
							</div>
                        </div>
                        <h3>Dodatkowe Informacje</h3>
                        <div class="mb-3">
                            <textarea name="description" class="form-control" id="InputDescription">{{ old('description') }}</textarea>
                        </div>
						
						@if ($errors->first('description'))
						<div>
							<span class="text-danger fw-bold">
								{{ $errors->first('description') }}
							</span>
						</div>
						@endif
                        
                        <div class="text-center text-lg-start mt-5">
                            <button type="submit" class="btn btn-outline-primary">Zapisz</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if(document.getElementById('confirmation')) {
            setTimeout(() => {
                document.getElementById('confirmation').remove();
            }, 5000);
        }
    });
</script>
@endsection
