@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-7">
            <h1>Witaj {{ auth()->user()->name }}!</h1>
            <p>Tutaj możesz edytować swoje dane i zmienić hasło.</p>

            @if (session('success'))
                <p id="confirmation" class="text-success">{{ session('success') }}</p>
            @endif

            <form method="POST" action="{{ route('user.update', auth()->user()->id) }}" class="pt-5">
                @csrf
                <div class="row g-3 align-items-center justify-content-between mb-3">
                    <div class="col-12 col-md-6">
                        <label for="InputName" class="form-label mb-0">Imię</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input value="{{ auth()->user()->name }}" name="name" type="name"
                            class="form-control form-control-sm" id="InputName" aria-describedby="nameHelp">
                    </div>
                    <div class="col-12 col-md-6 mt-0">

                        @if ($errors->first('name'))
                            <span class="text-danger fw-bold">
                                {{ $errors->first('name') }}
                            </span>
                        @else
                            <span class="form-text">
                                Może zawierać tylko litery
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-between mb-3">
                    <div class="col-12 col-md-6">
                        <label for="InputEmail" class="form-label mb-0">Email</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input value="{{ auth()->user()->email }}" name="email" type="email"
                            class="form-control form-control-sm" id="InputEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="col-12 col-md-6 mt-0">

                        @if ($errors->first('email'))
                            <span class="text-danger fw-bold">
                                {{ $errors->first('email') }}
                            </span>
                        @else
                            <span class="form-text">
                                Jest to również Twój login
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-between mb-3">
                    <div class="col-12 col-md-6">
                        <label for="InputPassword" class="form-label mb-0">Hasło</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="password" name="password" class="form-control form-control-sm" id="InputPassword">
                    </div>
                    <div class="col-12 col-md-6 mt-0">

                        @if ($errors->first('password'))
                            <span class="text-danger fw-bold">
                                {{ $errors->first('password') }}
                            </span>
                        @else
                            <span class="form-text">
                                Musi zawierać 8-20 znaków
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-between mb-3">
                    <div class="col-12 col-md-6">
                        <label for="InputPasswordRepeat" class="form-label mb-0">Powtórz Hasło</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="password" name="password_confirmation" class="form-control form-control-sm"
                            id="InputPasswordRepeat">
                    </div>
                    <div class="col-12 col-md-6 mt-0">

                        @if ($errors->first('password_confirmation'))
                            <span class="text-danger fw-bold">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @else
                            <span class="form-text">
                                Hasła muszą się zgadzać
                            </span>
                        @endif
                    </div>
                </div>
                <div class="text-center text-lg-start mt-5">
                    <button type="submit" class="btn btn-outline-info">Zapisz</button>
                </div>
            </form>
        </div>
        <div class="col-0 col-lg-5 d-none d-lg-flex align-items-center">
            <img class="w-75 mx-auto" src="{{ Storage::url('admin/home/main.webp') }}" alt="">
        </div>
    </div>
</div>
@endsection