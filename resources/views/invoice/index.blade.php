@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-0 col-lg-2">
                <nav class="nav d-none d-lg-flex flex-column sticky-top top-25">
                    @include('navs.nav')
                </nav>
            </div>
            <div class="col-12 col-lg-10">
                <div class="container-fluid">
                    <div class="row">
                        <h1>Przeglądaj Zlecenia</h1>
                        <p>Domyślne sortowanie według numeru zlecenia.</p>
                    </div>

                    @include('shared.success')

                    <div class="row">
                        <div class="col-12">

                            @foreach ($invoices as $invoice)
                                <div class="">
                                    <button class="btn btn-outline-dark mb-3 w-100" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $invoice->id }}" aria-expanded="false"
                                        aria-controls="collapse{{ $invoice->id }}">
                                        <div class="d-flex align-items-center justify-content-around">
                                            <p class="mb-0">#{{ $invoice->number }}</p>
                                            <p class="mb-0">{{ $invoice->registration }}</p>
                                            <p class="mb-0 p-0 lh-1">
                                                {{ $invoice->created_at->format('Y/m/d') }}
                                            </p>
                                            <span class="dropdown-toggle">Więcej</span>
                                        </div>
                                    </button>
                                    <div class="collapse" id="collapse{{ $invoice->id }}">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-8">
                                                    <div class="d-flex justify-content-between mb-5">
                                                        <div>
                                                            <p class="text-center fw-bold">Marka</p>
                                                            <p class="text-center">{{ $invoice->make }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-center fw-bold">Model</p>
                                                            <p class="text-center">{{ $invoice->model }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-center fw-bold">Przebieg</p>
                                                            <p class="text-center">{{ $invoice->milage }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-center fw-bold">Numer VIN</p>
                                                            <p class="text-center">{{ $invoice->vin }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="mb-5">
                                                        <h2 class="fs-5">Lista czynności serwisowych</h2>
                                                        <ul>
                                                            @for ($i = 0; $i < count($invoice->jobs->desc); $i++)
                                                                <li
                                                                    class="w-100 d-flex justify-content-between border-bottom">
                                                                    <p class="mb-0">
                                                                        <span class="me-3">
                                                                            {{ $i + 1 }}.
                                                                        </span>
                                                                        {{ $invoice->jobs->desc[$i] }}
                                                                    </p>
                                                                    <p class="mb-0">{{ $invoice->jobs->price[$i] / 100 }}
                                                                        PLN</p>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <div class="mb-5">
                                                        <h2 class="fs-5">Lista części serwisowych</h2>
                                                        <ul>
                                                            @for ($i = 0; $i < count($invoice->parts->desc); $i++)
                                                                <li
                                                                    class="w-100 d-flex justify-content-between border-bottom">
                                                                    <div>
                                                                        <p class="mb-0">
                                                                            <span class="me-3">
                                                                                {{ $i + 1 }}.
                                                                            </span>
                                                                            {{ $invoice->parts->desc[$i] }}
                                                                        </p>
                                                                    </div>
                                                                    <p class="mb-0">
                                                                        {{ $invoice->parts->price[$i] / 100 }}
                                                                        PLN</p>
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>
                                                    <div
                                                        class="border-bottom d-flex justify-content-between mb-3 align-items-center">
                                                        <h2 class="mb-0 fs-5">Suma</h2>
                                                        <p class="mb-0 fs-5">{{ $invoice->amount / 100 }} PLN</p>
                                                    </div>
                                                    <div class="d-flex justify-content-center mb-5">
                                                        <button
                                                            class="btn btn-sm py-0 btn-outline-info mx-3">Drukuj</button>
                                                        <a href="{{ route('invoice.download', ['id' => $invoice->id]) }}"
                                                            class="btn sm py-0 btn-outline-info mx-3">Pobierz PDF</a>
                                                        <a href="{{ route('invoice.edit', ['id' => $invoice->id]) }}"
                                                            class="btn sm py-0 btn-outline-primary mx-3">Edytuj</a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-0 col-lg-4 d-none d-lg-flex flex-column justify-content-between align-items-center mb-5">
                                                    <div class="mt-5">
                                                        <img class="" src="./storage/admin/invoice/main.png"
                                                            alt="">
                                                    </div>
                                                    <div class="text-center">
                                                        <form method="POST"
                                                            action="{{ route('invoice.destroy', $invoice->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-danger">Usuń</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
