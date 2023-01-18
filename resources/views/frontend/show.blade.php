@extends('layouts.search')

@section('main')
    <main class="container-fluid mb-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-lg-auto text-center">
                <h1 class="custom-text-shadow mt-5">Wyniki wyszukiwania dla: {{ $data }}</h1>
                <h2 class="custom-text-shadow fs-5 mb-5">Ilość dokumentów: {{ count($invoices) }}</h2>
                
                @foreach ($invoices as $invoice)
                <div>
                    <button class="btn btn-outline-dark mb-3 w-100 border-info" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{ $invoice->id }}" aria-expanded="false"
                        aria-controls="collapse{{ $invoice->id }}">
                        <div class="d-flex align-items-center justify-content-around">
                            <p class="mb-0">#{{ $invoice->number }}</p>
                            <p class="mb-0">{{ $invoice->registration }}</p>
                            <p class="mb-0 p-0 lh-1">
                                {{ $invoice->created_at->format('Y/m/d') }}
                            </p>
                            <span class="dropdown-toggle d-none d-md-inline">Więcej</span>
                            <span class="dropdown-toggle d-md-none"></span>
                        </div>
                    </button>
                    <div class="collapse" id="collapse{{ $invoice->id }}">
                        <div class="container">
                            <div class="row">
                                <div class="d-flex flex-column flex-md-row justify-content-between mb-5 px-0 px-md-4">
                                    <div>
                                        <p class="text-center fw-bold mb-0 mb-md-1">Marka</p>
                                        <p class="text-center">{{ $invoice->make }}</p>
                                    </div>
                                    <div>
                                        <p class="text-center fw-bold mb-0 mb-md-1">Model</p>
                                        <p class="text-center">{{ $invoice->model }}</p>
                                    </div>
                                    <div>
                                        <p class="text-center fw-bold mb-0 mb-md-1">Przebieg</p>
                                        <p class="text-center">{{ $invoice->mileage }}</p>
                                    </div>
                                    <div>
                                        <p class="text-center fw-bold mb-0 mb-md-1">Numer VIN</p>
                                        <p class="text-center">{{ $invoice->vin }}</p>
                                    </div>
                                </div>
                                <div class="mb-5 px-0 px-md-4">
                                    <h2 class="fs-5">
                                        Lista czynności serwisowych
                                    </h2>
                                    <ol class="list-group list-group-numbered">

                                        @foreach ($invoice->products as $product)
                                        <li class="list-group-item d-flex flex-column flex-lg-row justify-content-between">
                                            <p class="flex-fill text-start ps-3 mb-0">
                                                {{ $product->desc }}
                                            </p>
                                            <p class="mb-0 text-nowrap">
                                                <span class="mx-3 d-md-none">Cena:</span>
                                                {{ number_format($product->price / 100, 2) }} PLN
                                            </p>
                                        </li>
                                        @endforeach

                                        @foreach ($invoice->selectProducts as $product)
                                        <li class="list-group-item d-flex flex-column flex-lg-row justify-content-between">
                                            <p class="flex-fill text-start ps-3 mb-0">
                                                {{ $product->proName }}
                                                <span class="ms-3">
                                                    {{ $product->pivot->qnty != 1 ? 'x'.$product->pivot->qnty : '' }}
                                                </span>
                                            </p>
                                            <p class="mb-0 text-nowrap">
                                                <span class="mx-3 d-md-none">Cena:</span>
                                                {{ number_format($product->price / 100 * $product->pivot->qnty, 2) }} PLN
                                            </p>
                                        </li>
                                        @endforeach

                                    </ol>
                                </div>
                                <div class="mb-5 px-0 px-md-4">
                                    <h2 class="fs-5">
                                        Lista części serwisowych
                                    </h2>
                                    <ol class="list-group list-group-numbered">

                                        @foreach ($invoice->parts as $part)
                                        <li class="list-group-item d-flex flex-column flex-lg-row justify-content-between">
                                            <p class="flex-fill text-start ps-3 mb-0">
                                                {{ $part->desc }}
                                            </p>
                                            <p class="mb-0 text-nowrap">
                                                <span class="mx-3 d-md-none">Cena:</span>
                                                {{ number_format($part->price / 100, 2) }} PLN
                                            </p>
                                        </li>
                                        @endforeach

                                        @foreach ($invoice->selectParts as $part)
                                        <li class="list-group-item d-flex flex-column flex-lg-row justify-content-between">
                                            <p class="flex-fill text-start ps-3 mb-0">
                                                {{ $part->name }}
                                                <span class="ms-3">
                                                    {{ $part->pivot->qnty != 1 ? 'x'.$part->pivot->qnty : '' }}
                                                </span>
                                            </p>
                                            <p class="mb-0 text-nowrap">
                                                <span class="mx-3 d-md-none">Cena:</span>
                                                {{ number_format($part->price / 100 * $part->pivot->qnty, 2) }} PLN
                                            </p>
                                        </li>
                                        @endforeach

                                    </ol>
                                </div>

                                @if ($invoice->amount > 0)
                                <div
                                    class="border-bottom d-flex justify-content-between mb-3 align-items-center">
                                    <h2 class="mb-0 fs-5">Suma</h2>
                                    <p class="mb-0 fs-5 text-nowrap">
                                        <span class="mx-3 d-md-none">Cena:</span>
                                        {{ number_format($invoice->amount / 100, 2) }} PLN
                                    </p>
                                </div>
                                @endif

                                <div class="my-5">
                                    <h2 class="fs-5">Uwagi Dotyczące Serwisu</h2>
                                    <p class="border text-start p-2 px-3">
                                        {{ $invoice->description ? $invoice->description : 'Brak dodatkowych informacji.' }}
                                    </p>
                                </div>

                                <div class="d-flex justify-content-around justify-content-lg-center mb-5">
                                    <a href="{{ route('frontend.download', ['id' => $invoice->id]) }}"
                                        class="btn py-0 btn-outline-info mx-3">Pobierz PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </main>
@endsection
