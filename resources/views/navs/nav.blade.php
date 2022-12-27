<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link border-bottom {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page"
            href="{{ route('home') }}">Profil: {{ auth()->user()->name }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link border-bottom {{ Route::currentRouteName() == 'company.edit' ? 'active' : '' }}"
            href="{{ route('company.edit') }}">Dane Firmy</a>
    </li>
    <li class="nav-item dropdown border-bottom">
        <a class="nav-link dropdown-toggle {{ Route::currentRouteName() == 'invoice.index' || Route::currentRouteName() == 'invoice.create' ? 'active' : '' }}"
            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Zlecenia</a>
        <ul class="dropdown-menu text-center text-lg-start">
            <li>
                <a class="dropdown-item {{ Route::currentRouteName() == 'invoice.index' ? 'active' : '' }}"
                    href="{{ route('invoice.index') }}">Lista Zleceń</a>
            </li>
            <li>
                <a class="dropdown-item {{ Route::currentRouteName() == 'invoice.create' ? 'active' : '' }}"
                    href="{{ route('invoice.create') }}">Utwórz Zlecenie</a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link border-bottom {{ Route::currentRouteName() == 'category.index' ? 'active' : '' }}"
            href="{{ route('category.index') }}">Kategorie</a>
    </li>
    <li class="nav-item">
        <a class="nav-link border-bottom {{ Route::currentRouteName() == 'product.index' ? 'active' : '' }}"
            href="{{ route('product.index') }}">Usługi</a>
    </li>
    <li class="nav-item dropdown border-bottom">
        <a class="nav-link dropdown-toggle {{ Route::currentRouteName() == 'part.index' || Route::currentRouteName() == 'part.create' ? 'active' : '' }}" data-bs-toggle="dropdown" href="#" role="button"
            aria-expanded="false">Części Serwisowe</a>
        <ul class="dropdown-menu text-center text-lg-start">
            <li>
                <a class="dropdown-item {{ Route::currentRouteName() == 'part.index' ? 'active' : '' }}"
                    href="{{ route('part.index') }}">Lista Części</a>
            </li>
            <li>
                <a class="dropdown-item {{ Route::currentRouteName() == 'part.create' ? 'active' : '' }}"
                    href="{{ route('part.create') }}">Dodaj Części</a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link border-bottom {{ Route::currentRouteName() == 'review.index' ? 'active' : '' }}"
            href="{{ route('review.index') }}">Opinie Klientów</a>
    </li>
</ul>
