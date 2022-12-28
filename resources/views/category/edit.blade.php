@extends('layouts.app')

@section('content')
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
                        <div class="input-group mb-3">
                            <label for="InputCategory" class="input-group-text">Nazwa Kategorii</label>
                            <input value="{{ old('catName') ? old('catName') : $category->catName }}"
                            name="catName" type="text" class="form-control form-control-sm"
                            id="InputCategory" aria-describedby="nameHelp">
                        </div>
                        <div class="input-group mb-3">
                            <label for="InputDescription" class="input-group-text">Opis</label>
                            <textarea name="description" style="min-height: 100px;" id="InputDescription" class="form-control form-control-sm">{{ old('description') ? old('description') : $category->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Zapisz</button>
                    </form>

                    @include('shared.error', ['name' => 'catName'])

                </div>
                <div class="pt-5">
                    @if (!$category->products->isEmpty())
                        <h2 class="fs-4">Usługi w tej kategorii</h2>
                        <ul class="list-group list-group-flush">
                            @foreach ($category->products as $product)
                                <li class="list-group-item d-flex justify-content-between">
                                    <p class="d-flex justify-content-between flex-fill pe-lg-5">
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
                            <a class="btn btn-sm btn-outline-success py-0"
                                href="{{ route('product.create', $category->id) }}">Dodaj Usługę</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
