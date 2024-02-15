@extends("layouts.app")

@section('content')

<h2> Add Posts :  </h2>
<form method="POST" action="{{ route("posts.store") }}">
    @csrf
   
    @include('posts.form')

    <div class="d-grid mt-2">
      <button class="btn btn-success btn-block" type="submit">Add</button>
    </div>

</form>
    
@endsection
