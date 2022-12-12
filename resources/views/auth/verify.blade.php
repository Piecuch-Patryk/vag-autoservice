@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Link weryfikacyjny został wysłany na podany adres email.
                            </div>
                        @endif

                        Przed kontynuowaniem, sprawdź swój adres email.
                        Jeśli nie otrzymałeś wiadomości,
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">kliknij tutaj, aby przesłać
                                ponownie.</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
