@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-0 col-lg-3">
                <nav class="nav d-none d-lg-flex flex-column">
                    @include('navs.nav')
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <h1>{{ $company->name }}</h1>
                            <p>Tutaj możesz edytować dane swojej firmy.</p>

                            @include('shared.success')

                            <form method="POST" action="{{ route('company.update', $company->id) }}" class="pt-5">
                                @csrf
                                @method('PUT')
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="InputName" class="form-label mb-0">Nazwa</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="{{ old('name') ? old('name') : $company->name }}" name="name" type="text"
                                            class="form-control form-control-sm" id="InputName" aria-describedby="nameHelp">
                                    </div>

                                    @include('shared.error', ['name' => 'name'])
                                    
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="InputEmail" class="form-label mb-0">Email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="{{ old('email') ? old('email') : $company->email }}" name="email" type="email"
                                            class="form-control form-control-sm" id="InputEmail" aria-describedby="emailHelp">
                                    </div>

                                    @include('shared.error', ['name' => 'email'])

                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="InputPostCode" class="form-label mb-0">Kod Pocztowy</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="{{ old('post_code') ? old('post_code') : $company->post_code }}" name="post_code" type="text"
                                            class="form-control form-control-sm" id="InputPostCode" aria-describedby="nameHelp">
                                    </div>

                                    @include('shared.error', ['name' => 'post_code'])

                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="InputCity" class="form-label mb-0">Miasto</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="{{ old('city') ? old('city') : $company->city }}" name="city" type="text"
                                            class="form-control form-control-sm" id="InputCity" aria-describedby="nameHelp">
                                    </div>

                                    @include('shared.error', ['name' => 'city'])

                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="InputStreet" class="form-label mb-0">Ulica</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="{{ old('street') ? old('street') : $company->street }}" name="street" type="text"
                                            class="form-control form-control-sm" id="InputStreet" aria-describedby="nameHelp">
                                    </div>

                                    @include('shared.error', ['name' => 'street'])

                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="InputNumber" class="form-label mb-0">Numer</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="{{ old('number') ? old('number') : $company->number }}" name="number" type="text"
                                            class="form-control form-control-sm" id="InputNumber" aria-describedby="nameHelp">
                                    </div>

                                    @include('shared.error', ['name' => 'number'])

                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-12 col-md-3">
                                        <label for="InputPhone" class="form-label mb-0">Numer Telefonu</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input value="{{ old('phone') ? old('phone') : $company->phone }}" name="phone" type="text"
                                            class="form-control form-control-sm" id="InputPhone" aria-describedby="nameHelp">
                                    </div>

                                    @include('shared.error', ['name' => 'phone'])

                                </div>
                                <div class="text-center text-lg-start mt-5">
                                    <button type="submit" class="btn btn-outline-info">Zapisz</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-0 col-lg-4 d-none d-lg-flex align-items-center">
                            <img class="w-75 mx-auto" src="{{ Storage::url('admin/home/main.png') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection