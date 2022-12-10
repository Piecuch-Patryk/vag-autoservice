<a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Profil: {{ auth()->user()->name }}</a>
<a class="nav-link" href="#">Dane Firmy</a>
<a class="nav-link" href="#">Lista Zleceń</a>
<a class="nav-link" href="#">Utwórz Zlecenie</a>
<a class="nav-link" href="#">Opinie Klientów</a>