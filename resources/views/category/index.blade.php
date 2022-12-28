@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-10 mx-auto mb-3">
                <h1>Kategorie</h1>
                <div>

                    @if (session('success'))
                        <p id="confirmation" class="text-success">{{ session('success') }}</p>
                    @endif

                    <div class="modal fade modal-lg" id="categoriesModalForm" tabindex="-1" aria-labelledby="categoriesModalFormLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="categoriesModalFormLabel">Dodaj nową kategorię</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('category.store') }}" class="pt-5">
                                    @csrf
                                   
                                    <div class="input-group mb-3">
                                        <label for="InputCategory" class="input-group-text">Nazwa</label>
                                        <input value="{{ old('catName') }}" name="catName" type="text"
                                            class="form-control form-control-sm" id="InputCategory"
                                            aria-describedby="nameHelp">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="InputDescription" class="input-group-text">Opis</label>
                                        <textarea name="description" style="min-height: 100px;" id="InputDescription" class="form-control form-control-sm">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Dodaj</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    <button type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#categoriesModalForm">
                        Dodaj Kategorię
                    </button>



                    @include('shared.error', ['name' => 'catName'])
                    @include('shared.error', ['name' => 'description'])

                </div>

                <div>
                    <a href="{{ route('category.editOrder') }}" class="btn btn-outline-info mb-3">Edytuj Kolejność
                        Kategorii</a>
                </div>

                @include('category.shared.list')

            </div>
        </div>
    </div>
@endsection
