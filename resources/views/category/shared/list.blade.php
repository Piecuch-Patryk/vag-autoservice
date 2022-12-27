<ul class="list-group">

@foreach ($categories as $category)
    <li class="list-group-item text-center">
        <div>
            <div class="text-start p-3">
                <div class="d-flex flex-column flex-lg-row align-items-center">
                    <h5 class="fw-bold p-0 m-0 me-5">{{ $category->order }}. {{ $category->catName }}</h5>
                    <div>
                        <button class="btn btn-sm py-0 btn-outline-info dropdown-toggle me-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}" aria-expanded="false" aria-controls="collapse{{ $category->id }}">
                            Usługi
                        </button>
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-sm py-0 btn-outline-warning">Edytuj</a>
                        <form class="d-inline-block" method="POST" action="{{ route('category.destroy', $category->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger py-0">Usuń</button>
                        </form>
                    </div>
                </div>
                <p>{{ $category->description }}</p>
            </div>
        </div>
        <div class="collapse" id="collapse{{ $category->id }}">
            <div class="card card-body mt-2">

                @if (!$category->products->isEmpty())
                <ul class="list-group list-group-flush">
                    @foreach ($category->products as $product)
                        <li class="list-group-item d-flex justify-content-between">
                            <p class="d-flex justify-content-between flex-fill pe-lg-5">
                                <span>{{ $product->proName }}</span>
                                <span>{{ number_format($product->price / 100, 2) }} zł</span>
                            </p>
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
    </li>
@endforeach

</ul>