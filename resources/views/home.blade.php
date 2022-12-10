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
                        <h1>Witaj {{ auth()->user()->name }}!</h1>
                        <p>Tutaj możesz edytować swoje dane i zmienić hasło.</p>

                        @if(session('success'))
                        <p id="confirmation" class="text-success">{{ session('success') }}</p>
                        @endif

                        <form method="POST" action="{{ route('user.update', auth()->user()->id) }}" class="pt-5">
                            @csrf
                            <div class="row g-3 align-items-center justify-content-between mb-3">
                                <div class="col-auto">
                                    <label for="InputName" class="form-label mb-0">Imię</label>
                                </div>
                                <div class="col-auto">
                                    <input value="{{ auth()->user()->name }}" name="name" type="name" class="form-control" id="InputName" aria-describedby="nameHelp">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">

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
                                <div class="col-auto">
                                    <label for="InputEmail" class="form-label mb-0">Email</label>
                                </div>
                                <div class="col-auto">
                                    <input value="{{ auth()->user()->email }}" name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">

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
                                <div class="col-auto">
                                    <label for="InputPassword" class="form-label mb-0">Hasło</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" name="password" class="form-control" id="InputPassword">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">

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
                                <div class="col-auto">
                                    <label for="InputPasswordRepeat" class="form-label mb-0">Powtórz Hasło</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" name="password_confirmation" class="form-control" id="InputPasswordRepeat">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">

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
        setTimeout(() => {
            document.getElementById('confirmation').remove();
        }, 5000);
    });
</script>
@endsection
