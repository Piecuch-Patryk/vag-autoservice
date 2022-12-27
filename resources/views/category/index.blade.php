@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center">
        <div class="col-12 col-md-10 mx-auto mb-3">
            <h1>Kategorie</h1>
            <div>

                @if (session('success'))
                    <p id="confirmation" class="text-success">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('category.store') }}" class="pt-5">
                    @csrf
                    <div class="row g-3 align-items-center mb-3">
                        <h2 class="fs-5">Dodaj nową kategorię</h2>
                        <div class="col-12 col-md-9 input-group">
                            <label for="InputCategory" class="input-group-text">Nazwa Kategorii</label>
                            <input value="{{ old('catName') }}" name="catName" type="text"
                                class="form-control form-control-sm" id="InputCategory"
                                aria-describedby="nameHelp">
                            <button type="submit" class="btn btn-success">Dodaj</button>
                        </div>
                    </div>
                </form>

                @include('shared.error', ['name' => 'catName'])

            </div>

            <div>
                <a href="{{ route('category.editOrder') }}" class="btn btn-outline-info mb-3">Edytuj Kolejność Kategorii</a>
            </div>

            @include('category.shared.list')

        </div>
    </div>
</div>
@endsection
