@if (session('status'))
<div class="alert alert-success mt-4">
  {{ session('status') }}
</div>
@endif
@foreach ($errors->all() as $message)
 <div class="alert alert-danger mt-4">
   {{ $message }}
 </div>
@endforeach