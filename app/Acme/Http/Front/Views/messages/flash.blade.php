@if($errors->any())
<div class="alert alert-danger" role="role">
    @foreach($errors->all() as $error)
    <div>{{ $error }}</div>
    @endforeach
</div>
@endif

@if(session()->has('danger-message'))
<div class="alert alert-danger" role="alert">{{ session('danger-message') }}</div>
@endif
