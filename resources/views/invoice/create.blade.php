@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-0 col-lg-2">
                <nav class="nav d-none d-lg-flex flex-column">
                    @include('navs.nav')
                </nav>
            </div>
            <div class="col-12 col-lg-10">
                <div class="container-fluid">
                    <div class="row">
                        <h1>Formularz Naprawy</h1>
                        <p>Stwórz formularz naprawy w łatwy i przyjemny sposób.</p>

                        @include('shared.success')

                        <form method="POST" action="{{ route('invoice.store') }}" class="pt-5">
                            @csrf
                            <div class="mb-5 row">
                                <div class="col-12 col-md-7 col-lg-5 mx-auto">
                                    <div class="input-group input-group-sm mb-3">
                                        <label for="InputNumber" class="input-group-text">Numer Dokumentu</label>
                                        <input value="{{ $invoiceNumber }}" readonly name="number" type="text"
                                        class="form-control" id="InputNumber">
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-5 mx-auto">
                                    <div class="input-group input-group-sm mb-3">
                                        <label for="InputMake" class="input-group-text">Marka Pojazdu</label>
                                        <input value="{{ old('make') }}" name="make" type="text" class="form-control"
                                        id="InputMake">
                                    </div>

                                    @include('shared.error', ['name' => 'make'])
                                </div>
                                <div class="col-12 col-md-7 col-lg-5 mx-auto">
                                    <div class="input-group input-group-sm mb-3">
                                        <label for="InputModel" class="input-group-text">Model Pojazdu</label>
                                        <input value="{{ old('model') }}" name="model" type="text" class="form-control"
                                            id="InputModel">
                                    </div>

                                    @include('shared.error', ['name' => 'model'])
                                </div>
                                <div class="col-12 col-md-7 col-lg-5 mx-auto">
                                    <div class="input-group input-group-sm mb-3">
                                        <label for="InputRegistration" class="input-group-text">Numer Rejestracyjny</label>
                                        <input value="{{ old('registration') }}" name="registration" type="text"
                                            class="form-control" id="InputRegistration">
                                    </div>
        
                                    @include('shared.error', ['name' => 'registration'])
                                </div>
                                <div class="col-12 col-md-7 col-lg-5 mx-auto">
                                    <div class="input-group input-group-sm mb-3">
                                        <label for="InputVin" class="input-group-text">Numer VIN</label>
                                        <input value="{{ old('vin') }}" name="vin" type="text" class="form-control"
                                            id="InputVin">
                                    </div>
        
                                    @include('shared.error', ['name' => 'vin'])
                                </div>
                                <div class="col-12 col-md-7 col-lg-5 mx-auto">
                                    <div class="input-group input-group-sm mb-3">
                                        <label for="InputMilage" class="input-group-text">Przebieg</label>
                                        <input value="{{ old('milage') }}" name="milage" type="number" class="form-control"
                                            id="InputMilage">
                                    </div>
        
                                    @include('shared.error', ['name' => 'milage'])
                                </div>
                            </div>
                            <div class="mb-5" id="jobsContainer" data-container="jobs">
                                <h3>
                                    Wykonane Czynności
                                    <button type="button" data-create="jobs" class="btn btn-sm py-0 btn-success ms-3">Nowy Opis</button>
                                    <button type="button" data-create="list" class="btn btn-sm py-0 btn-success ms-3">Nowa Lista</button>
                                </h3>
                                @if (old('jobs.desc'))

                                    @for ($i = 0; $i < count(old('jobs.desc')); $i++)
                                        <div data-input-group="desc" class="row">
                                            <div class="col-8 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                                                <div class="input-group input-group-sm">
                                                    <label for="InputJobDesc" class="input-group-text">Opis</label>
                                                    <input value="{{ old('jobs.desc.' . $i) }}" name="jobs[desc][]"
                                                        type="text" class="form-control" id="InputPartDesc">
                                                </div>
                                            </div>
                                            <div class="col-4 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                                <div class="input-group input-group-sm">
                                                    <label for="InputJobPrice" class="input-group-text">Cena</label>
                                                    <input
                                                        value="{{ old('jobs.price.' . $i) ? old('jobs.price.' . $i) : '' }}"
                                                        name="jobs[price][]" type="text" class="form-control"
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
                                    <div data-input-group="desc" class="row">
                                        <div class="col-8 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputJobDesc" class="input-group-text">Opis</label>
                                                <input value="" name="jobs[desc][]" type="text"
                                                    class="form-control" id="InputPartDesc">
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputJobPrice" class="input-group-text">Cena</label>
                                                <input value="" name="jobs[price][]" type="text"
                                                    class="form-control" id="InputPartDesc">
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                            <button data-remove type="button"
                                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                                        </div>
                                    </div>
                                    <div data-input-group="list" class="row">
                                        <div class="col-5 px-0 ps-1 px-lg-3 col-lg-7 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputJobDesc" class="input-group-text">Lista Usług</label>
                                                <select name="jobsList[desc][]" id="InputPartList" class="flex-fill">
                                                    <option value="0">Wybierz usługę z listy</option>

                                                    @foreach ($products as $product)
                                                    <option value="{{ $product->proName }}" data-price="{{ $product->price }}">
                                                        Kategoria: {{ $product->category->catName }} | {{ $product->proName }} - {{ $product->price }} zł
                                                    </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputJobQnty" class="input-group-text">Ilość</label>
                                                <input value="" name="jobsList[qnty][]" type="number"
                                                    class="form-control" id="InputPartQnty" data-input-price="list">
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputJobPrice" class="input-group-text">Cena</label>
                                                <input value="" name="jobsList[price][]" type="text"
                                                    class="form-control" id="InputJobPrice">
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                            <button data-remove type="button"
                                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="mb-5" id="partsContainer" data-container="parts">
                                <h3>
                                    Lista Części
                                    <button type="button" data-create="parts" class="btn btn-sm py-0 btn-success ms-3">Nowy Opis</button>
                                    <button type="button" data-create="list" class="btn btn-sm py-0 btn-success ms-3">Nowa Lista</button>
                                </h3>
                                @if (old('parts.desc'))

                                @for ($i = 0; $i < count(old('parts.desc')); $i++)
                                    <div data-input-group="desc" class="row">
                                        <div class="col-7 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputPartDesc" class="input-group-text">Opis</label>
                                                <input value="{{ old('parts.desc.' . $i) }}" name="parts[desc][]"
                                                    type="text" class="form-control" id="InputPartDesc">
                                            </div>
                                        </div>
                                        <div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputPartPrice" class="input-group-text">Cena</label>
                                                <input
                                                    value="{{ old('parts.price.' . $i) ? old('parts.price.' . $i) : '' }}"
                                                    name="parts[price][]" type="text" class="form-control"
                                                    id="InputPartPrice">
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                            <button data-remove type="button"
                                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                                        </div>
                                    </div>
                                @endfor

                                @else
                                    <div data-input-group="desc" class="row">
                                        <div class="col-8 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputPartDesc" class="input-group-text">Opis</label>
                                                <input value="" name="parts[desc][]" type="text"
                                                    class="form-control" id="InputPartDesc">
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputPartPrice" class="input-group-text">Cena</label>
                                                <input value="" name="parts[price][]" type="text"
                                                    class="form-control" id="InputPartPrice">
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                            <button data-remove type="button"
                                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                                        </div>
                                    </div>
                                    <div data-input-group="list" class="row">
                                        <div class="col-5 px-0 ps-1 px-lg-3 col-lg-7 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputPartDesc" class="input-group-text">Lista Usług</label>
                                                <select name="partsList[desc][]" id="InputPartList" class="flex-fill">
                                                    <option value="0">Wybierz części z listy</option>

                                                    {{-- @foreach ($products as $product)
                                                    <option value="{{ $product->proName }}" data-price="{{ $product->price }}">
                                                        Kategoria: {{ $product->category->catName }} | {{ $product->proName }} - {{ $product->price }} zł
                                                    </option>
                                                    @endforeach --}}

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputPartQnty" class="input-group-text">Ilość</label>
                                                <input value="" name="partsList[qnty][]" type="number"
                                                    class="form-control" id="InputPartQnty" data-input-price="list">
                                            </div>
                                        </div>
                                        <div class="col-4 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                                            <div class="input-group input-group-sm">
                                                <label for="InputPartPrice" class="input-group-text">Cena</label>
                                                <input value="" name="partsList[price][]" type="text"
                                                    class="form-control" id="InputPartsPrice">
                                            </div>
                                        </div>
                                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center">
                                            <button data-remove type="button"
                                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <h3>Dodatkowe Informacje</h3>
                            <div class="mb-3">
                                <textarea name="description" class="form-control" id="InputDescription">{{ old('description') }}</textarea>
                            </div>

                            @include('shared.error', ['name' => 'description'])

                            <div class="text-center text-lg-start mt-5">
                                <button type="submit" class="btn btn-outline-info">Zapisz</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-invoice')
    <script>
        function updatePrice() {
            const selectedOption = this.closest('[data-input-group="list"]').querySelector('select').options[this.closest('[data-input-group="list"]').querySelector('select').options.selectedIndex];

            if(selectedOption.value != 0) {
                const qnty = this.closest('[data-input-group="list"]').querySelector('#InputPartQnty').value;
                const price = selectedOption.attributes['data-price'].value;
                const priceBox = this.closest('[data-input-group="list"]').querySelector('#InputJobPrice');

                priceBox.value = qnty * price;
            }else {
                this.value = '';
            }

        }

        function addInputGroup() {
            const current = this.attributes['data-create'].value;
            const container = this.closest('[data-container]');
            let newEl;

            if(current == 'list') {
                newEl = container.querySelector('[data-input-group="list"]').cloneNode(true);
                newEl.querySelector('[data-input-price="list"]').addEventListener('keyup', updatePrice);
            }else {
                newEl = container.querySelector('[data-input-group="desc"]').cloneNode(true);
            }

            newEl.querySelectorAll('input').forEach(input => input.value = '');
            newEl.querySelector('[data-remove]').addEventListener('click', removeInputGroup);

            return container.appendChild(newEl);
        }

        function removeInputGroup() {
            const elCount = this.closest('[data-container]').querySelectorAll('[data-input-group]').length;
            
            if (elCount > 2) return this.closest('[data-input-group]').remove();
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-create]').forEach(el => el.addEventListener('click', addInputGroup));
            document.querySelectorAll('[data-remove]').forEach(el => el.addEventListener('click',
                removeInputGroup));
            document.querySelectorAll('[data-input-price="list"]').forEach(el => el.addEventListener('keyup', updatePrice))
        });
    </script>
@endsection
