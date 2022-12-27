@extends('layouts.app')

@section('content')
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
                        <label for="InputMileage" class="input-group-text">Przebieg</label>
                        <input value="{{ old('mileage') }}" name="mileage" type="number" class="form-control"
                            id="InputMileage">
                    </div>

                    @include('shared.error', ['name' => 'mileage'])
                </div>
            </div>
            <div class="mb-5" id="jobsContainer" data-container="products">
                <div class="d-flex flex-column flex-md-row mb-3 text-center text-md-start">
                    <h3>Wykonane Czynności</h3>
                    <div>
                        <button type="button" data-create="custom" class="btn btn-sm py-0 btn-success ms-3">Nowy Opis</button>
                        <button type="button" data-create="select" class="btn btn-sm py-0 btn-success ms-3">Nowa Lista</button>
                    </div>
                </div>

                {{-- Custom --}}
                <div data-input-group="custom">
                    <div class="row" data-row-wrap>
                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputCustomDesc" class="input-group-text">Opis</label>
                                <input value="" name="custom[product][desc][]" type="text"
                                    class="form-control" id="InputCustomDesc">
                            </div>
                        </div>
                        <div class="col-6 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputCustomPrice" class="input-group-text">Cena</label>
                                <input value="" name="custom[product][price][]" type="text"
                                    class="form-control" id="InputCustomPrice">
                            </div>
                        </div>
                        <div class="col-6 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center justify-content-center">
                            <button data-remove type="button"
                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                        </div>
                    </div>
                </div>

                {{-- Select --}}
                <div data-input-group="select">
                    <div class="row" data-row-wrap>
                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-7 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputSelectDesc" class="input-group-text">Lista Usług</label>
                                <select name="select[product][desc][]" id="InputSelectDesc" class="flex-fill" data-select>
                                    <option value="0">Wybierz z listy</option>

                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ number_format($product->price / 100, 2) }}">
                                        {{ $product->proName }} - {{ number_format($product->price / 100, 2) }} zł
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputSelectQnty" class="input-group-text">Ilość</label>
                                <input value="" min="0" name="select[product][qnty][]" type="number"
                                    class="form-control" id="InputSelectQnty" data-input-select-qnty>
                            </div>
                        </div>
                        <div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputSelectPrice" class="input-group-text">Cena</label>
                                <input readonly value="" name="select[product][price][]" type="text"
                                    class="form-control" id="InputSelectPrice" data-input-select-price>
                            </div>
                        </div>
                        <div class="col-2 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center justify-content-center">
                            <button data-remove type="button"
                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5" id="partsContainer" data-container="parts">
                <div class="d-flex flex-column flex-md-row mb-3 text-center text-md-start">
                    <h3>Lista Części</h3>
                    <div>
                        <button type="button" data-create="custom" class="btn btn-sm py-0 btn-success ms-3">Nowy Opis</button>
                        <button type="button" data-create="select" class="btn btn-sm py-0 btn-success ms-3">Nowa Lista</button>
                    </div>
                </div>

                {{-- Custom --}}
                <div data-input-group="custom">
                    <div class="row" data-row-wrap>
                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-9 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputCustomDesc" class="input-group-text">Opis</label>
                                <input value="" name="custom[part][desc][]" type="text"
                                    class="form-control" id="InputCustomDesc">
                            </div>
                        </div>
                        <div class="col-6 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputCustomPrice" class="input-group-text">Cena</label>
                                <input value="" name="custom[part][price][]" type="text"
                                    class="form-control" id="InputCustomPrice">
                            </div>
                        </div>
                        <div class="col-6 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center justify-content-center">
                            <button data-remove type="button"
                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                        </div>
                    </div>
                </div>

                {{-- Select --}}
                <div data-input-group="select">
                    <div class="row" data-row-wrap>
                        <div class="col-12 px-0 ps-1 px-lg-3 col-lg-7 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputSelectDesc" class="input-group-text">Lista Części</label>
                                <select name="select[part][desc][]" id="InputSelectDesc" class="flex-fill" data-select>
                                    <option value="0">Wybierz z listy</option>

                                        @foreach ($parts as $part)
                                        <option value="{{ $part->id }}" data-price="{{ number_format($part->price / 100, 2) }}">
                                            {{ $part->name }} - {{ number_format($part->price / 100, 2) }} zł
                                        </option>
                                        @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputSelectQnty" class="input-group-text">Ilość</label>
                                <input value="" min="0" name="select[part][qnty][]" type="number"
                                    class="form-control" id="InputSelectQnty" data-input-select-qnty>
                            </div>
                        </div>
                        <div class="col-5 px-0 ps-1 px-lg-3 col-lg-2 mb-3">
                            <div class="input-group input-group-sm">
                                <label for="InputSelectPrice" class="input-group-text">Cena</label>
                                <input readonly value="" name="select[part][price][]" type="text"
                                    class="form-control" id="InputSelectPrice" data-input-select-price>
                            </div>
                        </div>
                        <div class="col-2 px-0 ps-1 px-lg-3 col-lg-1 mb-3 d-flex align-items-center justify-content-center">
                            <button data-remove type="button"
                                class="btn btn-sm py-0 btn-danger">Usuń</button>
                        </div>
                    </div>
                </div>
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
@endsection

@section('script-invoice')
    <script>
        function updatePrice() {
            const selectedOption = this.closest('[data-row-wrap]').querySelector('select').options[this.closest('[data-row-wrap]').querySelector('select').options.selectedIndex];

            if(selectedOption.value != 0) {
				const priceBox = this.closest('[data-row-wrap]').querySelector('[data-input-select-price]');
                const price = selectedOption.attributes['data-price'].value;
                const qntyBox = this.closest('[data-row-wrap]').querySelector('[data-input-select-qnty');
				let qnty = qntyBox.value;

				if(qnty == 0) {
					qnty = 1;
					qntyBox.value = qnty;
				}

                priceBox.value = (Math.round(qnty * price * 100) / 100).toFixed(2);
            }else {
				this.value = 0;
			}

        }

        function addInputGroup() {
            const currentSectionName = this.attributes['data-create'].value;
            const container = this.closest('[data-container]');
			const currentRow = container.querySelector(`[data-input-group="${currentSectionName}"]`)
            const clonedEl = currentRow.firstElementChild.cloneNode(true);

            clonedEl.querySelectorAll('input').forEach(input => input.value = '');
            clonedEl.querySelector('[data-remove]').addEventListener('click', removeInputGroup);

			if(clonedEl.querySelector('[data-input-select-qnty]')) {
				clonedEl.querySelector('[data-input-select-qnty]').addEventListener('change', updatePrice);
				clonedEl.querySelector('[data-input-select-qnty]').addEventListener('keydown', updatePrice);
				clonedEl.querySelector('[data-select]').addEventListener('change', updatePrice);
			}

            return currentRow.appendChild(clonedEl);
        }

        function removeInputGroup() {
            const rowsLeft = this.closest('[data-input-group]').children.length;

            if (rowsLeft > 1) return this.closest('[ data-row-wrap]').remove();
			else {
				this.closest('[data-row-wrap]').querySelectorAll('input').forEach(el => el.value = '');
				this.closest('[data-row-wrap]').querySelectorAll('select').forEach(el => el.value = 0);
			}
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-create]').forEach(el => el.addEventListener('click', addInputGroup));
            document.querySelectorAll('[data-remove]').forEach(el => el.addEventListener('click', removeInputGroup));
            document.querySelectorAll('[data-input-select-qnty]').forEach(el => el.addEventListener('change', updatePrice));
            document.querySelectorAll('[data-input-select-qnty]').forEach(el => el.addEventListener('keydown', updatePrice));
			document.querySelectorAll('[data-select]').forEach(el => el.addEventListener('change', updatePrice));
        });
    </script>
@endsection
