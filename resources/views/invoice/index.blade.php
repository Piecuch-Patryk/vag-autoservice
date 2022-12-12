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
                    <div class="row align-items-center">
                        <div class="col-12 col-md-7 mb-3">
                            <h1>Przeglądaj Zlecenia</h1>

                            @if(isset($search))
                            <p class="mb-0">
                                Wyniki wyszukiwania dla:
                                <span class="fw-bold me-3">
                                    {{ $search }}
                                </span>
                            </p>
                            <a class="text-info" href="{{ route('invoice.index') }}">Wróć</a>
                            @else
                            <p>Domyślne sortowanie według numeru zlecenia.</p>
                            @endif

                        </div>
                        
                        @if (!isset($search))
                        <div class="col-12 col-md-5 mb-5 m-md-0">
                            <form method="POST" action="{{ route('invoice.search') }}">
                                @csrf
                                <div class="input-group input-group-sm">
                                    <input value="{{ session('old_search') ? session('old_search') : '' }}" placeholder="VIN | Numer Rejestracyjny | Numer Zlecenia" name="search" type="text" class="form-control"
                                        id="Inputsearch">
                                    <button class="btn btn-sm btn-outline-primary py-0">Szukaj</button>
                                </div>
                            </form>

                            @if (session('failure'))
                                <div>
                                    <span class="text-danger">
                                        {{ session('failure') }}
                                    </span>
                                    <span class="text-danger fw-bold ms-1">
                                        {{ session('old_search') }}
                                    </span>
                                </div>
                            @endif

                            @include('shared.error', ['name' => 'search'])

                        </div>
                        @endif

                    </div>

                    @include('shared.success')

                    <div class="row">
                        <div class="col-12">

                            @if($invoices->isEmpty())
                            <p class="text-muted mt-3">Brak rekordów bazie danych. <a href="{{ route('invoice.create') }}" class="btn btn-sm btn-outline-success py-0">Utwórz Nowy</a></p>
                            @else                                

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
                                            <span class="dropdown-toggle d-none d-md-inline">Więcej</span>
                                            <span class="dropdown-toggle d-md-none"></span>
                                        </div>
                                    </button>
                                    <div class="collapse" id="collapse{{ $invoice->id }}">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-8">
                                                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
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
                                                            <p class="text-center">{{ $invoice->milage }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-center fw-bold mb-0 mb-md-1">Numer VIN</p>
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
                                                                    <p class="mb-0">{{ number_format($invoice->jobs->price[$i] / 100, 2) }}
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
                                                                        {{ number_format($invoice->parts->price[$i] / 100, 2) }}
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
                                                        <a href="{{ route('invoice.download', ['id' => $invoice->id]) }}"
                                                            class="btn btn-sm py-0 btn-outline-info mx-3">Pobierz PDF</a>
                                                        <a href="{{ route('invoice.edit', ['id' => $invoice->id]) }}"
                                                            class="btn btn-sm py-0 btn-outline-primary mx-3">Edytuj</a>
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
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
