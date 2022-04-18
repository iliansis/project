@if ($errors->all())
@foreach ($errors->all() as $er)
<div class="alert alert-danger" role="alert">
   {{$er}}
  </div>
@endforeach
@elseif(session('success'))
<div class="alert alert-success" role="alert">
   {{session('success')}}
  </div>
@endif
