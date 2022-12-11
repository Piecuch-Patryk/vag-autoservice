<a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Profil: {{ auth()->user()->name }}</a>
<a class="nav-link {{ Route::currentRouteName() == 'company.edit' ? 'active' : '' }}" href="{{ route('company.edit') }}">Dane Firmy</a>
<a class="nav-link" href="">Lista Zleceń</a>
<a class="nav-link {{ Route::currentRouteName() == 'invoice.create' ? 'active' : '' }}" href="{{ route('invoice.create') }}">Utwórz Zlecenie</a>
<a class="nav-link" href="#">Opinie Klientów</a>