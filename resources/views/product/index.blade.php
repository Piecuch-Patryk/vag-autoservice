@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-10 mx-auto mb-3">
                <h1>Usługi</h1>
                <div class="mb-3">
                    <a class="btn btn-sm btn-outline-success" href="{{ route('product.create', 0) }}">Dodaj
                        Usługę</a>
                </div>

                @include('shared.success')

                <div class="accordion" id="accordition-products">
                    @foreach ($categories as $category)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $loop->index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false"
                                    aria-controls="collapse-{{ $loop->index }}">
                                    {{ $category->catName }}
                                </button>
                            </h2>
                            <div id="collapse-{{ $loop->index }}" class="accordion-collapse collapse"
                                aria-labelledby="heading-{{ $loop->index }}" data-bs-parent="#accordition-products">
                                <div class="accordion-body">
                                    <p>
                                        {{ $category->description }}
                                    </p>

                                    @if (count($category->products) > 0)
                                        <ul class="list-group">
                                            @foreach ($category->products as $product)
                                                <li class="list-group-item text-center">
                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-0">
                                                            <span class="me-1">
                                                                {{ $loop->index + 1 }}.
                                                            </span>
                                                            {{ $product->proName }}
                                                        </p>
                                                        <p class="mb-0">{{ number_format($product->price / 100, 2) }} zł
                                                        </p>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <a class="btn btn-sm btn-outline-info py-0 mx-3"
                                                                href="{{ route('product.edit', $product->id) }}">Edytuj</a>
                                                            <form method="POST"
                                                                action="{{ route('product.destroy', $product->id) }}"
                                                                class="d-flex align-items-center">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="btn btn-sm btn-outline-danger py-0 mx-3">Usuń</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <div>
                                            <small>Brak usług w tej kategorii.</small>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
