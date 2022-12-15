<div class="rating rated pb-2">

	@for ($i = 5; $i >= 1; $i--)
    <input disabled type="radio" {{ $review->rating == $i ? 'checked' : '' }} id="rated-{{ $i }}">
    <label for="rating-{{ $i }}"></label>
	@endfor

</div>
