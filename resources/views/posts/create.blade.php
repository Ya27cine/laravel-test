@extends("layout")

@section('content')

<h2> Add Posts : </h2>
<form method="POST" action="{{ route("posts.store") }}">
    @csrf
   
    @include('posts.form')

    <button type="submit">Add</button>

</form>
    
@endsection