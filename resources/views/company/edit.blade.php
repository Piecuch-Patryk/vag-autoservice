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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <h1>{{ $company->name }}</h1>
                            <p>Tutaj możesz edytować dane swojej firmy.</p>

                            @if (session('success'))
                                <p id="confirmation" class="text-success">{{ session('success') }}</p>
                            @endif

                            <form method="POST" action="{{ route('company.update', $company->id) }}" class="pt-5">
                                @csrf
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-auto">
                                        <label for="InputName" class="form-label mb-0">Nazwa</label>
                                    </div>
                                    <div class="col-auto">
                                        <input value="{{ $company->name }}" name="name" type="name"
                                            class="form-control" id="InputName" aria-describedby="nameHelp">
                                    </div>


                                    @if ($errors->first('name'))
                                        <span class="text-danger fw-bold">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-auto">
                                        <label for="InputEmail" class="form-label mb-0">Email</label>
                                    </div>
                                    <div class="col-auto">
                                        <input value="{{ auth()->user()->email }}" name="email" type="email"
                                            class="form-control" id="InputEmail" aria-describedby="emailHelp">
                                    </div>


                                    @if ($errors->first('email'))
                                        <span class="text-danger fw-bold">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-auto">
                                        <label for="InputPostCode" class="form-label mb-0">Kod Pocztowy</label>
                                    </div>
                                    <div class="col-auto">
                                        <input value="{{ $company->post_code }}" name="post_code" type="name"
                                            class="form-control" id="InputPostCode" aria-describedby="nameHelp">
                                    </div>

                                    @if ($errors->first('post_code'))
                                        <span class="text-danger fw-bold">
                                            {{ $errors->first('post_code') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-auto">
                                        <label for="InputCity" class="form-label mb-0">Miasto</label>
                                    </div>
                                    <div class="col-auto">
                                        <input value="{{ $company->city }}" name="city" type="name"
                                            class="form-control" id="InputCity" aria-describedby="nameHelp">
                                    </div>


                                    @if ($errors->first('city'))
                                        <span class="text-danger fw-bold">
                                            {{ $errors->first('city') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-auto">
                                        <label for="InputStreet" class="form-label mb-0">Ulica</label>
                                    </div>
                                    <div class="col-auto">
                                        <input value="{{ $company->street }}" name="street" type="name"
                                            class="form-control" id="InputStreet" aria-describedby="nameHelp">
                                    </div>


                                    @if ($errors->first('street'))
                                        <span class="text-danger fw-bold">
                                            {{ $errors->first('street') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="row g-3 align-items-center mb-3">
                                    <div class="col-auto">
                                        <label for="InputNumber" class="form-label mb-0">Numer</label>
                                    </div>
                                    <div class="col-auto">
                                        <input value="{{ $company->number }}" name="number" type="name"
                                            class="form-control" id="InputNumber" aria-describedby="nameHelp">
                                    </div>


                                    @if ($errors->first('number'))
                                        <span class="text-danger fw-bold">
                                            {{ $errors->first('number') }}
                                        </span>
                                    @endif
                                </div>
                                <div class="text-center text-lg-start mt-5">
                                    <button type="submit" class="btn btn-outline-primary">Zapisz</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-0 col-lg-4 d-none d-lg-block">
                            <img src="./storage/admin/home/main.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('confirmation')) {
                setTimeout(() => {
                    document.getElementById('confirmation').remove();
                }, 5000);
            }
        });
    </script>
@endsection
