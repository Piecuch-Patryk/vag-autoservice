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
                    <div class="col-12 col-lg-7">
                        <h1>Witaj {{ auth()->user()->name }}!</h1>
                        <p>Tutaj możesz edytować swoje dane i zmienić hasło.</p>

                        <form action="#" class="pt-5">
                            @csrf
                            <div class="row g-3 align-items-center justify-content-between mb-3">
                                <div class="col-auto">
                                    <label for="InputName" class="form-label">Imię</label>
                                </div>
                                <div class="col-auto">
                                    <input type="name" class="form-control" id="InputName" aria-describedby="nameHelp">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">
                                    <span class="form-text">
                                        Może zawierać tylko litery
                                    </span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center justify-content-between mb-3">
                                <div class="col-auto">
                                    <label for="InputEmail" class="form-label">Email</label>
                                </div>
                                <div class="col-auto">
                                    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">
                                    <span class="form-text">
                                        Jest to również Twój login
                                    </span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center justify-content-between mb-3">
                                <div class="col-auto">
                                    <label for="InputPassword" class="form-label">Hasło</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" class="form-control" id="InputPassword">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">
                                    <span class="form-text">
                                        Musi zawierać 8-20 znaków
                                    </span>
                                </div>
                            </div>
                            <div class="row g-3 align-items-center justify-content-between mb-3">
                                <div class="col-auto">
                                    <label for="InputPasswordRepeat" class="form-label">Powtórz Hasło</label>
                                </div>
                                <div class="col-auto">
                                    <input type="password" class="form-control" id="InputPasswordRepeat">
                                </div>
                                <div class="col-auto mt-2 me-0 mb-0 ms-auto me-lg-auto ms-lg-3">
                                    <span class="form-text">
                                        Hasła muszą się zgadzać
                                    </span>
                                </div>
                            </div>
                            <div class="text-center text-lg-start mt-5">
                                <button type="submit" class="btn btn-outline-primary">Zapisz</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-0 col-lg-5 d-none d-lg-block pe-5">
                        <img src="./storage/admin/home/main.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
