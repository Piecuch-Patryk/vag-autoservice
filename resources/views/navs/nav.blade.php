<a class="nav-link border-bottom {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page"
    href="{{ route('home') }}">Profil: {{ auth()->user()->name }}</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'company.edit' ? 'active' : '' }}"
    href="{{ route('company.edit') }}">Dane Firmy</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'invoice.index' ? 'active' : '' }}"
    href="{{ route('invoice.index') }}">Lista Zleceń</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'invoice.create' ? 'active' : '' }}"
    href="{{ route('invoice.create') }}">Utwórz Zlecenie</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}"
    href="{{ route('category.index') }}">Kategorie</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}"
    href="{{ route('product.index') }}">Usługi</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'review.index' ? 'active' : '' }}" href="{{ route('review.index') }}">Opinie Klientów</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'part.index' ? 'active' : '' }}" href="{{ route('part.index') }}">Części Zamienne</a>
<a class="nav-link border-bottom {{ Route::currentRouteName() == 'part.create' ? 'active' : '' }}" href="{{ route('part.create') }}">Dodaj Części Zamienne</a>
