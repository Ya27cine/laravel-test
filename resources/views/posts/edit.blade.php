@extends("layout")

@section('content')

<h2> Edit Posts : </h2>
<form method="POST" action="{{ route("posts.update", ["post" => $post]) }}">
    @csrf
    @method("PUT")

     @include('posts.form')

    <button type="submit">Edit</button>
</form>
    
@endsection