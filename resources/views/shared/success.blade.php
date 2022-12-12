@if(session('success'))
<p id="confirmation" class="text-success">{{ session('success') }}</p>
@endif

@section('script')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    if(document.getElementById('confirmation')) {
        setTimeout(() => {
            document.getElementById('confirmation').remove();
        }, 5000);
    }
});
</script>
@endsection