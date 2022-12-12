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
                <h1>Formularz Naprawy</h1>
                <p>Stwórz formularz naprawy w łatwy i przyjemny sposób.</p>

                @include('shared.success')

                <form method="POST" action="{{ route('invoice.update', $invoice->id) }}" class="pt-3">
                    @csrf
                    <div class="input-group input-group-sm mb-3">
                        <label for="InputNumber" class="input-group-text">Numer Dokumentu</label>
                        <input value="{{ $invoice->number }}" readonly name="number" type="text" class="form-control"
                            id="InputNumber">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <label for="InputMake" class="input-group-text">Marka Pojazdu</label>
                        <input value="{{ old('make') ? old('make') : $invoice->make }}" name="make" type="text"
                            class="form-control" id="InputMake">

                    </div>

                    @include('shared.error', ['name' => 'make'])

                    <div class="input-group input-group-sm mb-3">
                        <label for="InputModel" class="input-group-text">Model Pojazdu</label>
                        <input value="{{ old('model') ? old('model') : $invoice->model }}" name="model" type="text"
                            class="form-control" id="InputModel">
                    </div>

                    @include('shared.error', ['name' => 'model'])

                    <div class="input-group input-group-sm mb-3">
                        <label for="InputRegistration" class="input-group-text">Numer Rejestracyjny</label>
                        <input value="{{ old('registration') ? old('registration') : $invoice->registration }}"
                            name="registration" type="text" class="form-control" id="InputRegistration">
                    </div>

                    @include('shared.error', ['name' => 'registration'])

                    <div class="input-group input-group-sm mb-3">
                        <label for="InputVin" class="input-group-text">Numer VIN</label>
                        <input value="{{ old('vin') ? old('vin') : $invoice->vin }}" name="vin" type="text"
                            class="form-control" id="InputVin">
                    </div>


                    @include('shared.error', ['name' => 'vin'])

                    <div class="input-group input-group-sm mb-3">
                        <label for="InputMilage" class="input-group-text">Przebieg</label>
                        <input value="{{ old('milage') ? old('milage') : $invoice->milage }}" name="milage" type="number"
                            class="form-control" id="InputMilage">
                    </div>

                    @include('shared.error', ['name' => 'milage'])

                    <div id="jobsContainer" data-container="jobs" class="pt-3 mb-3">
                        <h3>
                            Wykonane Czynności
                            <button type="button" data-create="jobs" class="btn btn-sm py-0 btn-success ms-3">+</button>
                        </h3>

                        @if (old('jobs.desc'))
                            @for ($i = 0; $i < count(old('jobs.desc')); $i++)
                                <div data-input-group="jobs" class="row">
                                    <div class="col-7 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobDesc" class="input-group-text">Opis</label>
                                            <input value="{{ old('jobs.desc.' . $i) }}" name="jobs[desc][]" type="text"
                                                class="form-control" id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobPrice" class="input-group-text">Cena</label>
                                            <input value="{{ old('jobs.price.' . $i) ? old('jobs.price.' . $i) : '' }}"
                                                name="jobs[price][]" type="number" class="form-control" id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                        <button data-remove type="button" class="btn btn-sm py-0 btn-danger">Usuń</button>
                                    </div>
                                </div>
                            @endfor
                        @else
                            @for ($i = 0; $i < count($invoice->jobs['desc']); $i++)
                                <div data-input-group="jobs" class="row">
                                    <div class="col-7 px-0 ps-1 px-lg-3 col-lg-8 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobDesc" class="input-group-text">Opis</label>
                                            <input value="{{ $invoice->jobs['desc'][$i] }}" name="jobs[desc][]"
                                                type="text" class="form-control" id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-5 px-0 ps-1 px-lg-3 col-lg-3 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobPrice" class="input-group-text">Cena</label>
                                            <input value="{{ $invoice->jobs['price'][$i] }}" name="jobs[price][]"
                                                type="number" class="form-control" id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                        <button data-remove type="button"
                                            class="btn btn-sm py-0 btn-danger">Usuń</button>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>

                    <div id="partsContainer" data-container="parts" class="mb-3">
                        <h3>
                            Części serwisowe
                            <button type="button" data-create="jobs" class="btn btn-sm py-0 btn-success ms-3">+</button>
                        </h3>
                        @if (old('parts.desc'))
                            @for ($i = 0; $i < count(old('parts.desc')); $i++)
                                <div data-input-group="parts" class="row">
                                    <div class="col-7 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobDesc" class="input-group-text">Opis</label>
                                            <input value="{{ old('parts.desc.' . $i) }}" name="parts[desc][]"
                                                type="text" class="form-control" id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobPrice" class="input-group-text">Cena</label>
                                            <input value="{{ old('parts.price.' . $i) ? old('parts.price.' . $i) : '' }}"
                                                name="parts[price][]" type="number" class="form-control"
                                                id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                        <button data-remove type="button"
                                            class="btn btn-sm py-0 btn-danger">Usuń</button>
                                    </div>
                                </div>
                            @endfor
                        @else
                            @for ($i = 0; $i < count($invoice->parts['desc']); $i++)
                                <div data-input-group="parts" class="row">
                                    <div class="col-7 px-0 ps-1 px-lg-3 col-lg-8 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobDesc" class="input-group-text">Opis</label>
                                            <input value="{{ $invoice->parts['desc'][$i] }}" name="parts[desc][]"
                                                type="text" class="form-control" id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-5 px-0 ps-1 px-lg-3 col-lg-3 mb-3">
                                        <div class="input-group input-group-sm">
                                            <label for="InputJobPrice" class="input-group-text">Cena</label>
                                            <input value="{{ $invoice->parts['price'][$i] }}" name="parts[price][]"
                                                type="number" class="form-control" id="InputPartDesc">
                                        </div>
                                    </div>
                                    <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                        <button data-remove type="button"
                                            class="btn btn-sm py-0 btn-danger">Usuń</button>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    </div>

                    <h3>Dodatkowe Informacje</h3>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" id="InputDescription">{{ old('description') ? old('description') : $invoice->description }}</textarea>
                    </div>

                    @include('shared.error', ['name' => 'description'])

                    <div class="text-center text-lg-start mt-5">
                        <button type="submit" class="btn btn-info btn-sm py-0">Zapisz</button>
                        <a class="btn btn-warning btn-sm py-0 ms-5" href="{{ route('invoice.index') }}">Anuluj</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script-invoice')
    <script>
        function addInputGroup() {
            const current = this.attributes['data-create'].value;
            const container = this.closest('[data-container]');
            const newEl = container.querySelector('[data-input-group').cloneNode(true);

            newEl.querySelectorAll('input').forEach(input => input.value = '');
            newEl.querySelector('[data-remove]').addEventListener('click', removeInputGroup);

            return container.appendChild(newEl);
        }

        function removeInputGroup() {
            const elCount = this.closest('[data-container]').querySelectorAll('[data-input-group]').length;
            if (elCount > 1) return this.closest('[data-input-group]').remove();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-create]').forEach(el => el.addEventListener('click', addInputGroup));
            document.querySelectorAll('[data-remove]').forEach(el => el.addEventListener('click',
            removeInputGroup));
        });
    </script>
@endsection
