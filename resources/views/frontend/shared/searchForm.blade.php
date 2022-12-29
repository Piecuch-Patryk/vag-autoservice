<form method="POST" action="{{ route('frontend.search') }}" class="d-flex justify-content-between">
    @csrf
    <input required type="text" placeholder="Wpisz numer VIN" name="search" value="{{ session('old_search') ? session('old_search') : '' }}"
        class="flex-fill border-0">
    <button class="btn btn-outline-primary py-0 shadow-sm">Szukaj</button>
</form>
