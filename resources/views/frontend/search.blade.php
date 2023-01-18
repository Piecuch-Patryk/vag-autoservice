@extends('layouts.search')

@section('main')
    <main class="container-fluid mb-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-lg-auto text-center py-3">
                <h2 class="custom-text-shadow">Znaleziono: {{ count($invoices) }}</h2>
                <p class="custom-text-shadow">Wpisz hasło i przeglądaj lub pobierz historię serwisowania online</p>
                <form action="{{ route('frontend.show') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="invoicePassword" class="form-control" placeholder="Hasło" aria-label="Hasło" aria-describedby="button-invoice-password">
                        <button class="btn btn-outline-primary" type="submit" id="button-invoice-password">OK</button>
                    </div>
                    <input name="search" type="hidden" value="{{ $data }}">
                </form>

                @include('shared.error', ['name' => 'invoicePassword'])
                
                @if(session('failure_invoicePassword'))
                <div>
                    <p class="text-danger fw-bold m-0 custom-text-shadow">
                        {{ session('failure_invoicePassword') }}
                    </p>
                    <p class="custom-text-shadow">Skontaktuj się z nami w celu przypomnienia hasła</p>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
