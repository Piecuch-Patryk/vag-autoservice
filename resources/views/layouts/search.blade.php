<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body id="front">
	<nav class="bg-custom-dark p-3">
    <div class="d-flex justify-content-around align-items-center p-xl-5 mx-xl-5 p-3 bg-black">
        <div>
            <a href="/">
                <img class="d-lg-none" src="{{ Storage::url('logo/white.png') }}" alt="">
                <img class="d-none d-lg-block" src="{{ Storage::url('logo/white-lg.png') }}" alt="">
            </a>
        </div>
        <div class="d-flex flex-column flex-lg-row align-items-center text-center d-lg-none">
            <a href="tel:{{ $company->phone }}"
                class="text-custom-secondary text-decoration-none">{{ $company->phone }}</a>
            <p class="text-custom-secondary mb-0 lh-1 custom-font-size">
                {{ $company->city }} ul. {{ $company->street }} {{ $company->number }}
            </p>
        </div>
        <div class="d-none d-lg-flex flex-column">
            <div class="text-light">
				<h1>Cieszymy się, że jesteś z nami!</h1>
                <p>Poniżej znajdziesz listę zleceń zrealizowanych w naszym warsztacie.</p>
                <p>Oczywiście dbamy o Twoje bezpieczeństwo, każdy plik jest zaszyfrowany hasłem.</p>
				<p>Skontaktuj się z nami, aby odzyskać zapomniane hasło.</p>
			</div>
			<div>
                <div class="bg-white p-2 rounded-1 ms-0 me-auto mb-3">
                    @include('frontend.shared.searchForm')
                </div>

                <div class="d-none d-lg-flex justify-content-end me-4">
                    @include('frontend.shared.searchFormFailure')
                </div>
            </div>
        </div>
    </div>

	<div class="d-lg-none text-light mt-3">
		<h1>Cieszymy się, że jesteś z nami!</h1>
		<p>Poniżej znajdziesz listę zleceń zrealizowanych w naszym warsztacie.</p>
		<p>Oczywiście dbamy o Twoje bezpieczeństwo, każdy plik jest zaszyfrowany hasłem.</p>
		<p>Skontaktuj się z nami, aby odzyskać zapomniane hasło.</p>
	</div>

    <div class="d-lg-none">
        <div class="bg-white p-2 mb-3 rounded-1">
            @include('frontend.shared.searchForm')
        </div>
    </div>

    <div class="d-lg-none text-center">
        @include('frontend.shared.searchFormFailure')
    </div>
</nav>

	@yield('main')

    @include('frontend.shared.footer')

    @include('cookie-consent::index')
</body>

</html>
