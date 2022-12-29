@extends('layouts.frontend')

@section('main')
    <main class="container-fluid mb-5">
        <div class="row">
            <div class="col-12 col-lg-8 mx-lg-auto text-center">
                <h1 class="custom-text-shadow fs-3 my-5">Wyniki wyszukiwania - {{ count($invoices) }}</h1>
                <ul class="list-group">

                    @foreach ($invoices as $invoice)
                        <li class="list-group-item">
                            <div class="d-flex flex-column flex-md-row justify-content-between">
                                <p class="mb-0">{{ $loop->index + 1 }}. Utworzono: {{ $invoice->created_at->format('Y/m/d') }}</p>
                                <a href="{{ route('frontend.download', ['id' => $invoice->id]) }}"
                                    class="btn py-0 btn-outline-primary mx-3">Pobierz PDF</a>
                            </div>
                        </li>
                    @endforeach

                </ul>
                <h2 class="my-5 fs-6">Do zobaczenia w warsztacie!</h2>
            </div>
        </div>
    </main>
@endsection
